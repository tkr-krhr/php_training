# ベースイメージを指定
FROM node:14-alpine

# 作業ディレクトリを設定
WORKDIR /app

# 依存関係をインストール
COPY package.json ./
RUN npm install

# アプリケーションのソースコードをコピー
COPY . .

# アプリケーションのビルド
RUN npm run build

# ポートを公開
EXPOSE 3000

# コンテナを実行するコマンドを指定
CMD ["npm", "start"]
