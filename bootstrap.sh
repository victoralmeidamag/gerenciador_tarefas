#!/usr/bin/env bash
set -euo pipefail


PROJECT_ROOT="$(pwd)"
COMPOSER_IMAGE="composer:2"
COMPOSER_FLAGS="--no-interaction --prefer-dist --no-progress"
IGNORE_EXT="--ignore-platform-req=ext-*"

if [[ ! -f vendor/bin/sail ]]; then
  echo "Instalando dependências (primeira etapa, ignorando extensões)…"
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$PROJECT_ROOT":/var/www/html \
    -w /var/www/html \
    "$COMPOSER_IMAGE" \
    composer install $COMPOSER_FLAGS $IGNORE_EXT
  echo "vendor/ gerado."
fi

if [[ ! -f .env ]]; then
  echo ".env não encontrado — copiando de .env.example"
  cp .env.example .env
fi


echo "Subindo containers Sail…"
./vendor/bin/sail up -d --wait


echo "Rodando composer install dentro do Sail (com extensões nativas)…"
./vendor/bin/sail composer install $COMPOSER_FLAGS


echo "Gerando APP_KEY…"
./vendor/bin/sail artisan key:generate --ansi --force

echo "Rodando migrate"
./vendor/bin/sail artisan migrate --seed

echo -e "\n Pronto! A aplicação deve estar disponível em http://localhost\n"
