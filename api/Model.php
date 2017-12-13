<?php

class Model
{

  public function test($param)
  {
    
  }

  public function _add($opt = [], &$error){
    return $this->_add_or_update('add', $opt, $error);
  }

  public function _update($opt, &$error){
    // dd($opt);
    return $this->_add_or_update('update', $opt, $error);
  }

  public function _add_or_update($type, $opt, &$error = null){
    $is_add = $type == 'add';

    if ($is_add) {
      unset($opt['id']);
      $sql = $this->make_add_sql($opt);
    }else{
      $id = @$opt['id'];
      // dd($opt);
      if (! $old = $this->_find($id)) {
        throw new \Exception('invalid: id');
      }
      $opt = array_merge($old, $opt);
      $sql = $this->make_update_sql($opt);
    }

    // dd($sql);

    return $this->db->prepare($sql)->execute();
  }

  public function make_add_sql($opt)
  {
    $all_column = $this->column_name_list();
    $col_sql = $val_sql = '';
    foreach ($opt as $col => $val) {
      if (in_array($col, $all_column)) {
        $col_sql .= $col . ', ';
        $val_sql .= "'$val' , ";
      }else{
        continue;
      }
    }

    $col_sql = trim($col_sql, ', ');
    $val_sql = trim($val_sql, ', ');

    return "insert into $this->table ($col_sql) values ($val_sql)";
  }

  public function make_update_sql($opt)
  {
    $all_column = $this->column_name_list();
    $id = @$opt['id'];
    $kv_sql = '';
    foreach ($opt as $col => $val) {
      if (in_array($col, $all_column)) {
        if ($col == 'id') {
          continue;
        }
        $kv_sql .= " $col = '$val', ";
      }else{
        continue;
      }
    }

    $kv_sql = trim($kv_sql, ', ');
    return "update $this->table set $kv_sql where id = $id";
  }

  public function column_name_list(){
    $name_list = [];
    $list = $this->column_list();
    // dd($list);
    foreach ($list as $col) {
      $name_list[] = $col['Field'];
    }

    return $name_list;
  }

  public function column_list(){
    $s = $this->db->prepare("desc $this->table");
    $s->execute();
    return $s->fetchAll(2);
  }

  public function _read($opt = []){
    $id = @$opt['id'];
    $where = @$opt['where'];
    $or_where = @$opt['or_where'];
    $order = @$opt['order'];
    $page = @$opt['page'];
    $like = @$opt['like'];
    $or_like = @$opt['or_like'];
    $limit = @$opt['limit'] ?: 10;

    // dd($opt);

    if ($where && $or_where) {
      throw new \Exception('where||or_where');
    }

    $sql_where = $sql_or_where = $sql_order = $sql_limit = $sql_like = $sql_or_like = '';

    if ($id) {
      // dd($id);
      $sql = "select * from $this->table where id = $id";
      $s = $this->db->prepare($sql);
      $s->execute();
      return $s->fetchAll(PDO::FETCH_ASSOC);
    }else{
      if ($where) {
        $sql_where = ' where ';
        $i = 0;
        foreach ($where as $key => $value) {
          $count = $key . " = '" . $value . "'";

          if ($i > 0) {
            $count = "and " . $count;
          }

          $sql_where .= $count . ' ';
          $i++;
        }
      }

      if ($or_where) {
        $sql_where = ' where ';
        $i = 0;
        foreach ($or_where as $key => $value) {
          $count = $key . "='" . $value ."'";
          if ($i > 0) {
            $count = "or " . $count;
          }

          $sql_or_where .= $count . ' ';
          $i++;
        }
      }

      // dd($sql_where);

      if ($page) {
        $offset = $limit * ($page - 1);
        $sql_limit = "limit $offset, $limit";
      }

      if ($order) {
        $by = $order['by'];
        $direction = @$order['direction']?:'desc';

        $sql_order = "order by $by $direction";
      }
    }

    if ($like) {
      $i = 0;
      $count = '';
      if ($where) {
        $sql_like = 'and ';
      }else{
        $sql_like = 'where ';
      }

      foreach ($like as $key => $value) {
        if ($i > 0) {
          $count = 'and ' . $count;
        }

        $count .= $key . " like '%" . $value . "%'";
        $i++;
      }

      $sql_like .= $count;
    }

    if ($or_like) {
      $i = 0;
      $count = '';
      if ($where) {
        $sql_or_like = 'or ';
      }else{
        $sql_or_like = 'where ';
      }

      foreach ($or_like as $key => $value) {
        if(is_array($value)){
          $j = 0;
          foreach ($value as $item) {
            if ($j > 0) {
              $count = 'or ' . $count;
            }
            $count = $key . " like '%" . $item . "%'" .$count;
            $j++;
          }
          continue;
        };
        if ($i > 0) {
          $count = 'or ' . $count;
        }

        $count .= $key . " like '%" . $value . "%'";
        $i++;
      }

      $sql_or_like .= $count;
    }

    $sql = "select * from $this->table $sql_where $sql_or_where $sql_like $sql_or_like $sql_order $sql_limit";

    // dd($sql);

    $s = $this->db->prepare($sql);
    $s->execute();
    return $s->fetchAll(PDO::FETCH_ASSOC);
  }

  public function _count(){
    // dd(1);
    $sql = "select count(*) from $this->table";
    $s = $this->db->prepare($sql);
    $s->execute();
    return $s->fetch(PDO::FETCH_NUM)[0];
  }

  public function _remove($id){
    $sql = "delete from $this->table where id = :id";
    $s = $this->db->prepare($sql);
    $r = $s->execute(['id'=>$id]);
    return $r?
      ['success'=>true]:
      ['success'=>false,'msg' => 'db_internal_error'];
  }

  public function _col_exist($col, $val, $id = null){
    $sql = "select * from $this->table where $col = '$val'";
    if ($id) {
      $sql = $sql . " and id <> $id";
    }
    $s = $this->db->prepare($sql);
    $s->execute();
    $r = $s->fetch(PDO::FETCH_ASSOC);
    return (bool) $r;
  }

  public function _find($id)
  {
    // dd($id);
    if (!$id) {
      return false;
    }
    $s = $this->db
      ->prepare("select * from $this->table where id = :id");

    $s->execute([
      'id' => $id,
    ]);

    return $s->fetch(PDO::FETCH_ASSOC);
  }
}