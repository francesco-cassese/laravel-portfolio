# 🖼️ Laravel Portfolio — Sito Personale con Autenticazione e Area Admin

Applicazione web in Laravel per un portfolio personale, con autenticazione utente e un'area admin protetta. Esercizio della specializzazione PHP: l'obiettivo è esercitarsi con l'installazione di Laravel, lo scaffolding di autenticazione tramite Laravel Breeze e la creazione di un layout dedicato per il pannello di amministrazione.

Nessun frontend framework, solo Laravel con Blade, Bootstrap e uno stile personalizzato per l'area admin.

## ✨ Funzionalità

- Autenticazione completa via **Laravel Breeze** (login, registrazione, reset password, conferma password, verifica email) con UI in Bootstrap
- Gestione profilo utente (modifica dati, aggiornamento password, cancellazione account) tramite `ProfileController`
- Area admin protetta dal middleware `auth`, raggiungibile alla rotta `/admin`, con layout dedicato e sidebar di navigazione responsive (offcanvas su mobile)
- Dashboard admin con hero banner di benvenuto, stat card animate (progetti, messaggi, utenti) e sezione di azioni rapide
- Stile custom in **SCSS** (variabili Bootstrap personalizzate) con Bootstrap Icons, senza librerie JS aggiuntive

## 📸 Screenshot

![Dashboard admin](docs/screenshot-dashboard.png)

## 🎯 Obiettivi dell'esercizio

La traccia dell'esercizio richiedeva di:

- Installare un progetto Laravel da zero.
- Installare Laravel Breeze come starter kit di autenticazione, con Bootstrap al posto dello scaffolding Tailwind di default.
- Verificare che il flusso di autenticazione (registrazione, login, logout, gestione profilo) funzioni correttamente.
- Creare un layout dedicato per un'area admin, protetta da autenticazione, distinto dal layout del sito pubblico.

## 🛠️ Stack tecnico

- Laravel 11 / PHP 8.2+, con Laravel Breeze per l'autenticazione
- Blade per le viste, Bootstrap 5 + Bootstrap Icons, SCSS con variabili custom
- Vite per l'asset bundling, gestito con pnpm
- MySQL come database

## 📁 Struttura del progetto

```
laravel-portfolio/
├── app/
│   └── Http/Controllers/
│       ├── Auth/                        # Controller di autenticazione (Breeze)
│       └── ProfileController.php        # Gestione profilo utente
├── database/
│   └── migrations/
│       └── ..._create_users_table.php   # Struttura della tabella users
├── resources/
│   ├── scss/
│   │   ├── app.scss                     # Import Bootstrap + stili custom
│   │   └── _admin.scss                  # Stili dedicati all'area admin
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php            # Layout sito pubblico
│       │   ├── guest.blade.php          # Layout pagine di autenticazione
│       │   └── admin.blade.php          # Layout area admin (sidebar + topbar)
│       ├── auth/                        # Viste di login, registrazione, reset password...
│       ├── profile/                     # Viste di gestione profilo
│       ├── admin/
│       │   └── dashboard.blade.php      # Dashboard area admin
│       └── welcome.blade.php            # Homepage pubblica
├── routes/
│   ├── web.php                          # Rotte pubbliche, profilo e admin
│   └── auth.php                         # Rotte di autenticazione (Breeze)
└── README.md
```

## 🚀 Come avviare il progetto

### Requisiti

- PHP 8.2 o superiore
- Composer
- Node.js con pnpm
- Un server MySQL

### Setup

Clona il progetto:

```bash
git clone https://github.com/francesco-cassese/laravel-portfolio.git
cd laravel-portfolio
```

Installa le dipendenze PHP e JS:

```bash
composer install
pnpm install
```

Copia il file d'ambiente e genera la chiave dell'applicazione:

```bash
cp .env.example .env
php artisan key:generate
```

Configura le variabili `DB_*` nel file `.env` con le credenziali del tuo database MySQL, quindi crea il database ed esegui le migration:

```bash
php artisan migrate
```

Avvia il server Laravel e il dev server di Vite:

```bash
php artisan serve
pnpm dev
```

Poi visita [http://localhost:8000](http://localhost:8000) per il sito pubblico, registra un account e accedi a [http://localhost:8000/admin](http://localhost:8000/admin) per l'area admin.

## 🔎 Come funziona

- Le rotte di autenticazione sono gestite da Laravel Breeze (`routes/auth.php`): registrazione, login, logout, reset e conferma password, verifica email.
- Il gruppo di rotte protetto da `auth` in `routes/web.php` espone `/profile` (modifica profilo tramite `ProfileController`) e `/admin` (dashboard dell'area amministrativa).
- Il layout `layouts/admin.blade.php` definisce la struttura dell'area admin: sidebar di navigazione con offcanvas responsive, topbar con dropdown utente e logout, e uno slot `@yield('content')` per le singole viste.
- `admin/dashboard.blade.php` estende questo layout mostrando un banner di benvenuto, tre stat card (progetti, messaggi, utenti) con animazioni di entrata ed effetto hover, e una sezione di azioni rapide verso il profilo e il sito pubblico.
- Lo stile dell'area admin è definito in `resources/scss/_admin.scss`: sidebar scura, accento viola/indaco, card con ombre leggere e transizioni CSS, senza dipendenze JS aggiuntive oltre a Bootstrap.

## 👤 Autore

Francesco Cassese
