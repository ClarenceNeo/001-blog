-- MySQL dump 10.16  Distrib 10.2.12-MariaDB, for osx10.13 (x86_64)
--
-- Host: localhost    Database: Pblog
-- ------------------------------------------------------
-- Server version	10.2.12-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `create_at` int(10) unsigned DEFAULT NULL,
  `update_at` int(10) unsigned DEFAULT NULL,
  `state` varchar(32) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (4,'聊聊那些打猎游戏','在《猎魔人》里，昆特牌王杰洛特的兼职是狩魔猎人；在《怪物猎人》里猎人是一群上天砍飞龙下海砍海怪的猛汉；《血源诅咒》里猎杀兽化人类的猎人；《魔兽世界》里的著名猎人是个黄皮兽人，此外还有一部堪称有生之年的日本漫画叫做《猎人》……总之，猎人这个职业在各种ACG作品里获得了各种魔改，然而，正是因为这些魔改，让真正的猎人，让真正的狩猎逐渐淡出了大众的视线。抛去游戏动漫里那些危险又浪漫的外衣，提起最普通的“猎人”，人们能想到的也许只有那些喜爱这项危险又奢侈的运动的欧美佬，野外跌打滚爬，百步穿杨的弓手，和时不时能在新闻上看见的偷猎者……',1513077000,NULL,''),(5,'我是怎么在一个无脑氪金手游里体验到世态炎凉的？','我从来没有经历过所谓的“传奇”时代，但是他的赫赫威名我是有所耳闻。在千禧年之后互联网突飞猛进的时代，这款可怕的游戏占领了中国无数的网吧，也成为了中国网络游戏一个无法抹去的里程碑。时至今日，无数网页游戏还想借着传奇的招牌，妄图吸引老玩家来一场借尸还魂，大赚一笔的套路。',1513077000,NULL,''),(6,'充钱有时候不能使你变得更强，你在这个游戏里闻到的铜臭味可能只是开始','我从来没有经历过所谓的“传奇”时代，但是他的赫赫威名我是有所耳闻。在千禧年之后互联网突飞猛进的时代，这款可怕的游戏占领了中国无数的网吧，也成为了中国网络游戏一个无法抹去的里程碑。时至今日，无数网页游戏还想借着传奇的招牌，妄图吸引老玩家来一场借尸还魂，大赚一笔的套路。',1513077000,NULL,''),(7,'《比利林恩的中场漫步》：如何度过你生命中最糟糕的一天','它将全部力量注入那些安静至极的时刻，比利与队长蘑菇在那棵孤独的树下晦涩的对话，迈入战场之前的一句句“我爱你”，伊拉克民居中小孩仇恨的眼神，比利家中饭桌上的沉默，洗手间中阿尔伯特充满敬意的话语，以及水泥管道中那段静谧而残忍至极的决斗。\n\n悄无声息，却又胜过千言万语。\n\n李安分外谦恭地质疑着一切，将美国的一个个侧面展现到我们面前，再轻轻戳破遮在眼前的每一层窗户纸。家庭、爱情、国家、战争、体育、商业甚至是娱乐业本身，这些在其他电影中金光闪闪的主题，在这部片子里全部黯淡了下来，唯有伊拉克士兵身下蔓延而出的那一泊血，格外清晰。',1513077000,NULL,''),(23,'我再也没有勇气在《怪物猎人 世界》里抡起锤子','最近《怪物猎人 世界》让无数玩家的狩猎之魂重燃，游戏中不少武器也都融合了一些新招式，那打起来相当的爽。昨天我们整理过一篇高手狩猎雄火龙的视频合集，其实从中也能学到一些狩猎技巧，今天我就继续为大家搬运2个锤子的狩猎视频，它们都是来自 niconico 上玩家 Lexius 的投稿。',1513149900,NULL,''),(24,'JavaScript深入之从ECMAScript规范解读this','ECMAScript 的类型分为语言类型和规范类型。<br>\n\nECMAScript 语言类型是开发者直接使用 ECMAScript 可以操作的。其实就是我们常说的Undefined, Null, Boolean, String, Number, 和 Object。<br>\n\n而规范类型相当于 meta-values，是用来用算法描述 ECMAScript 语言结构和 ECMAScript 语言类型的。规范类型包括：Reference, List, Completion, Property Descriptor, Property Identifier, Lexical Environment, 和 Environment Record。<br>\n\n没懂？没关系，我们只要知道在 ECMAScript 规范中还有一种只存在于规范中的类型，它们的作用是用来描述语言底层行为逻辑。<br>\n\n今天我们要讲的重点是便是其中的 Reference 类型。它与 this 的指向有着密切的关联。',1513149900,NULL,'');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_and_tag`
--

DROP TABLE IF EXISTS `post_and_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_and_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`,`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_and_tag`
--

LOCK TABLES `post_and_tag` WRITE;
/*!40000 ALTER TABLE `post_and_tag` DISABLE KEYS */;
INSERT INTO `post_and_tag` VALUES (6,4,5),(7,4,7),(8,5,5),(9,7,6),(3,23,1),(4,23,5),(5,23,7),(10,24,1),(11,24,2);
/*!40000 ALTER TABLE `post_and_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'前端'),(2,'javascript'),(3,'css'),(4,'html'),(5,'游戏'),(6,'电影'),(7,'音乐');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-23 15:38:01
