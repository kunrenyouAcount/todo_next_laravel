## 仮開発環境構築手順

- リポジトリから develop ブランチを pull
- MRM/ に移動して `docker-compose up -d --build`
- `docker-compose exec app /bin/bash` でappコンテナに入る
- appコンテナ内で `composer i` でライブラリ群インストール
- appコンテナ内で `php artisan migrate` でテーブル群作成
    - `require(/work/vendor/autoload.php): failed to open stream: No such file or directory in ...`と出た場合は `composer dump-autoload` でオートローダを再度吐き出す
    - Connection Refused になる場合、 `php artisan cache:clear`を試す
- http://localhost:8080/login に繋いでログイン画面が表示されることを確認
- appコンテナ内で `php artisan db:seed --class=DummyDataSeeder`
    - 環境にもよるが、だいたい10分程度かかる
- ログインユーザは MRM/README.md に記載のものと同じ
- 停止時はとりあえず `docker-compose stop` で
    - dbコンテナ内のデータを DataVolumeコンテナでの永続化などはまだしていないので、`down`で破棄すると消える
- 再開時は `docker-compose start`

node は入れてないので npm はホストで叩いてください
