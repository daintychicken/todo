## Todoリストアプリ
シンプルなTodoリストのアプリを制作しました
<br><br>

## 開発環境
PHP v8.0.2  
MySQL
<br><br>

## 環境構築  
下記コマンドで任意の場所にcdし、このリポジトリをクローンします
```
cd [フォルダ名]
git clone https://github.com/daintychicken/lateral_todo.git
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
<img src="https://user-images.githubusercontent.com/111351842/204201765-bd4754a4-56a3-45c3-a8df-7b57a20a5f47.png" width="400px">  
**①マイページ**  
ログインしているユーザーのマイページに遷移する  
**②ログアウト**  
ログアウトし、ログイン画面に遷移する  
**③検索欄**  
タスク名やステータスでタスクを検索することができる  
クリアボタンを押下すると、全件表示に戻す  
**④タスク一覧**  
登録されているタスクの一覧を表示する  
ステータスは期限と完了日の日付を見て自動で出力される  
**⑤新規登録**  
タスクの新規登録画面に遷移する    
**⑥詳細**  
対象のタスク詳細画面に遷移する  
**⑦編集**  
対象のタスク編集画面に遷移する  
**⑧削除**  
対象のタスクを削除する  
<br>

### ①マイページ
ログインしているユーザーの情報を表示する  
編集ボタンから内容を更新することができる  
<img src="https://user-images.githubusercontent.com/111351842/204199629-1d74ace3-133d-4ee5-a38c-90f45f214180.PNG" width="400px">

### ⑤新規登録
登録したい内容を入力し、登録ボタンを押下するとタスクを登録し、一覧画面に遷移する  
<img src="https://user-images.githubusercontent.com/111351842/204200446-b6928cb6-5d5b-46fe-9218-0a8eaccc40e1.PNG" width="400px">

### ⑦編集
登録したタスクの内容を修正したり、完了日の入力をすることができる  
更新ボタンを押下すると内容を更新し、一覧画面に遷移する  
<img src="https://user-images.githubusercontent.com/111351842/204200923-5f995113-0ff5-4be8-ab20-621eb733c51a.PNG" width="400px">
