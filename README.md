## Todoリストアプリ
シンプルなTodoリストのアプリを制作しました
<br><br>

## 開発環境
PHP v8.0.2  
MySQL
<br><br>

## 環境構築

このリポジトリを下記コマンドで任意の場所にクローンします
```
git clone https://github.com/daintychicken/lateral_todo.git
```
  
下記コマンドでクローンしたフォルダにcdします
```
cd [フォルダ名]
```
  
下記コマンドでcomposerをインストールします
```
composer install
```
  
下記コマンドで.env.exampleファイルを元に、.envファイルを作成します  
.envファイルを作成したら、環境に合わせて  
パラメータ(DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)を修正します
```
cp .env.example .env
```
  
下記コマンドでマイグレーションを実行します
```
php artisan migrate
```
  
下記コマンドでシーダーを実行し、初期データを登録します
```
php artisan db:seed
```
  
下記コマンドでストレージのパーミッションを変更します
```
sudo chmod 777 -R storage
```
<br>

## サーバー起動
サーバーを起動します
```
php artisan serve
```
サーバーを起動後、ブラウザで`http://localhost:[port番号]`にアクセスすると
アプリを使用することができます
<br><br>

## アプリの使い方

### ログイン画面
ユーザーテーブルに用意されているlogin_idとpasswordでログインする  
※passwordの初期値は全てpass  
<img src="https://user-images.githubusercontent.com/111351842/204192898-10a4319f-c524-4023-8283-6533f1699e3e.PNG" width="400px">

### Todoリスト画面
ログインするとユーザーのタスク一覧が表示される  
<img src="https://user-images.githubusercontent.com/111351842/204196713-11652c8a-8c18-4688-aee5-5afb70cbfff8.png" width="400px">  
**①マイページ**  
ログインしているユーザーのマイページに遷移する  
**②ログアウト**  
ログアウトし、ログイン画面に遷移する  
**③検索欄**  
タスク名やステータスでタスクを検索することができる  
クリアボタンを押下すると、全件表示に戻す  
**⑤詳細**  
対象のタスクの詳細を表示する  
**⑥編集**  
対象のタスクの編集画面に遷移する  
**⑦削除**  
対象のタスクを削除する  

