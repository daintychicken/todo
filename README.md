<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## 開発環境
**Docker Desktop**  
**MySQL**  
**Visual Studio code**  
**laravel**  
**Windows10**


## Docker のセットアップ

### docker desktop のインストール
  
以下のページよりDocker Desktop for Windowsをダウンロードします  
https://docs.docker.com/desktop/install/windows-install/

画面に沿ってインストールを終わらせます  
インストールが終わったら、Dockerを起動します  


### wsl2 及び ubuntu のセットアップ

Microsoft Store から Ubuntu をインストールする
インストールが終了したらスタートメニューから Ubuntu を起動

エクスプローラーで「\\wsl$」へアクセス
PowerShell にて以下コマンド実行

```
wsl --set-version Ubuntu-20.04 2
wsl -l -v 　# Ubuntu-20.04がVERSION2となっていることを確認
```
