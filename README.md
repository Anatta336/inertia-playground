# Inertia Playground
Just playing around with Inertia.

## Startup
You'll need Docker installed to run this project.

This project is set up to use Sail, so normally installing dependencies would be done through Sail's Docker container. But the first time running, you'll not have the Sail Docker image locally. You can install the dependencies using a temporary container:
```
docker run --rm -u $UID:$(id -g) -v $PWD:/app composer install --ignore-platform-reqs
```

Build the project's Docker images:
```
./vendor/bin/sail build
```

Bring the containers up:
```
./vendor/bin/sail up -d
```

Install dependencies:
```
./vendor/bin/sail composer i
./vendor/bin/sail npm i
```

Run the project:
```
./vendor/bin/sail npm run dev
```

You should then be able to access the project locally at: http://localhost/products
