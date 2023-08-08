# PSP 怪物猎人P1 配信下载服务 复活计划

# PSP MHP1 DownLoad Server project

## 说明

本服务为 皓月云 axibug.com 原创服务

Bilibili:

<a href="https://www.bilibili.com/video/BV1X5411W7gu/" title=""><img width = "320" height = "200"  src="https://i1.hdslb.com/bfs/archive/edf355f68cfe8e836230fd73282da1cf36f7a8c8.jpg@320w_200h_1c_!web-space-upload-video.webp" alt="" /></a>

CAPCOM已于2014年7越30日，停止了对MHP1初代的配信服务

体验不到黑狼鸟等任务，不再有完整体验，真的再也无法补救了吗

难道~再也无法完整的朝花夕拾了吗？

那...如果我说...我可以亲手复活配信服务呢？

没错就是这个项目。

实现方式，主要是对PSP的下载方式，以及任务文件的研究。

（CAPCOM定制的一些HTML独有的标签）

## 直接使用

（推荐）皓月云直接提供了服务，使用专用镜像，即可直接下载。

无需自行部署服务器。

下载地址：

## 部署

对于服务器，这个只是一个常见的php站点。

你需要准备的环境

  * PHP
  * Mysql/MariaDB
  * Nginx/Apache

### Step1：数据库

在Mysql/MariaDB中，创建名为“mhpdl”的数据库。

导入sql脚本“mhpquest.sql”，以创建文件和数据。

将你自己的脚本文件(.mib),放入“\BONUS\MHPSP”目录。

### Step2

在你的Web服务器中，Nginx/Apache 或别的web服务器，搭建本php站点。

在MIME配置.mib扩展名可直接下载

如：Nginx配置，在mime.types中加入

```
text/plain; charset=Shift_JIS   mib;
```

### Step3：config.php中配置数据连接

```
$haoyeu_dbip = '127.0.0.1';
$haoyue_dbport = 3306;
$haoyeu_dbname = 'mhpdl';
$haoyue_dbuser = '';
$haoyue_dbpwd = '';
```

### 结束