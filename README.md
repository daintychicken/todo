## Todoリストアプリ
シンプルなTodoリストのアプリを制作しました
<br>
<br>

## 開発環境
PHP v8.0.2  
MySQL
<br>
<br>

## 環境構築

このリポジトリを任意の場所にクローンします
```
git clone https://github.com/daintychicken/lateral_todo.git
```

クローンしたフォルダにcdします
```
cd [フォルダ名]
```

composerをインストールします
```
composer install
```

.env.exampleファイルを元に、.envファイルを作成します
```
cp .env.example .env
```
.envファイルを作成したら、環境に合わせて
DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORDを修正します

マイグレーションを実行します
```
php artisan migrate
```

シーダーを実行し、初期データを登録します
```
php artisan db:seed
```

ストレージのパーミッションを変更します
```
sudo chmod 777 -R storage
```
