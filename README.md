# iStoria SA Home

Home page for iStoria.sa that you can download the app from it.


## Installation

//Laravel App

1. Clone the repository
```bash
git clone
```

2. Navigate to the project directory
```bash

cd iStoria
```

3. Install dependencies
```bash
composer install
```

4. Create a `.env` file
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Set up the database
```bash
php artisan migrate
```

7. Seed the database (optional)
```bash
php artisan db:seed
```

8. Start the development server
```bash
php artisan serve
```

