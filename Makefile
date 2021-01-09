start-todo-backend:
	php -S localhost:8091 apps/todo/backend/public/index.php

start-todo-frontend:
	cd apps/todo/frontend/ && ~/.nvm/versions/node/v10.22.0/bin/node\
 	~/.nvm/versions/node/v10.22.0/lib/node_modules/npm/bin/npm-cli.js run serve --scripts-prepend-node-path=auto
