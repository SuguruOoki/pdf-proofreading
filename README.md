## 概要

PDFの校正を行うためのツールを作成してみている。
サクッと雑なものを作る想定。
慣れているという理由でPHPを採用。

## 参考

https://qiita.com/nero-15/items/4f7c1ec9e354c6b0822a
https://gomiba.co/archives/2018/03/1886/
https://tech.yappli.io/entry/textlint-with-githubactions
https://qiita.com/Y-Kanoh/items/9d450a6868183557042f
https://www.thegeekstuff.com/2010/04/7z-7zip-7za-file-compression/

## TODO

- [x] 最低限の環境を作る
- [x] PDFを読み込む
- [ ] PDFを都合の良いようにパースする
- [ ] textlintなどのライブラリを選定・導入
- [ ] パースしたデータをこうせいする
- [ ] PDFとして再度吐き出す

## 発生したエラーメモ

### docker compose up -dの際のエラー

```shell
51.75 Processing triggers for libgdk-pixbuf-2.0-0:arm64 (2.42.2+dfsg-1+deb11u1) ...
51.77 Processing triggers for libc-bin (2.31-13+deb11u5) ...
51.78 Errors were encountered while processing:
51.78  elpa-magit
51.80 E: Sub-process /usr/bin/dpkg returned an error code (1)
------
failed to solve: process "/bin/sh -c apt-get update && apt-get install -y git-all" did not complete successfully: exit code: 100
(base) suguruohki@SugurunoMacBook-Pro-2 pdf-proofreading % docker compose up -d
[+] Running 1/1
```

git-allが入らなかった模様。ひとまず色々必要ないので、gitに入れ替えた。

```git
- apt-get install git-all
+ apt-get install git
```


### composer requireの際のエラー

```
composer require smalot/pdfparser
```

を実行した際に次のエラーが発生した。

```shell
    Failed to download symfony/polyfill-mbstring from dist: The zip extension and unzip/7z commands are both missing, skipping.
The php.ini used by your command-line PHP is: /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
    Now trying to download from source
  - Syncing symfony/polyfill-mbstring (v1.28.0) into cache
    Failed to download smalot/pdfparser from dist: The zip extension and unzip/7z commands are both missing, skipping.
The php.ini used by your command-line PHP is: /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
    Now trying to download from source
```