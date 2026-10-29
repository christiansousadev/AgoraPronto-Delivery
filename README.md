# AgoraPronto Delivery 🛵🍔

> **Ecossistema Completo Multi-Restaurante de Delivery sob Demanda (Mobile & Web)**  
> **Autor & Desenvolvedor:** Christian Sousa  
> **E-mail & Suporte:** `christiansousadev@gmail.com`

---

## 📌 Sumário
1. [Visão Geral](#-visão-geral)
2. [Estrutura do Repositório](#-estrutura-do-repositório)
3. [Pré-requisitos do Ambiente](#-pré-requisitos-do-ambiente)
4. [Instalação Pós-Clone (Guia Passo a Passo)](#-instalação-pós-clone-guia-passo-a-passo)
   - [Passo 1: Clonar o Repositório](#passo-1-clonar-o-repositório)
   - [Passo 2: Configurar Arquivos Ignorados (.gitignore)](#passo-2-configurar-arquivos-ignorados-gitignore)
   - [Passo 3: Configurar e Rodar o Backend (Laravel)](#passo-3-configurar-e-rodar-o-backend-laravel)
   - [Passo 4: Configurar e Compilar os Aplicativos (Flutter)](#passo-4-configurar-e-compilar-os-aplicativos-flutter)
5. [Guia de Configuração de Credenciais & APIs](#-guia-de-configuração-de-credenciais--apis)
   - [Google Maps Platform](#google-maps-platform)
   - [Firebase & Push Notifications (FCM v1)](#firebase--push-notifications-fcm-v1)
   - [Google reCAPTCHA](#google-recaptcha)
   - [Assinatura de Release Android (Keystore)](#assinatura-de-release-android-keystore)
6. [Resumo dos Comandos de Build](#-resumo-dos-comandos-de-build)
7. [Documentação Adicional](#-documentação-adicional)

---

## 🚀 Visão Geral

O **AgoraPronto Delivery** é uma solução completa para plataformas de entrega de comida que conecta clientes, restaurantes parceiros e entregadores em tempo real. O ecossistema é composto por:

* **Painel Administrativo & Gestão de Restaurantes:** Aplicação web em PHP Laravel 10 com controle financeiro, zonas de entrega, catálogo de produtos, relatórios e APIs REST v1/v2.
* **App do Cliente (Mobile & Web):** Aplicativo Flutter com detecção de endereço via GPS, busca de restaurantes por raio/zona, carrinho inteligente, cupons e rastreamento de pedidos ao vivo.
* **App do Entregador (Driver):** Aplicativo Flutter com rastreamento GPS em tempo real e em segundo plano, alertas sonoros de novas corridas, navegação até o restaurante/cliente e confirmação de entrega via OTP.
* **App do Restaurante & PDV:** Aplicativo Flutter para recepção de pedidos com som de alerta contínuo, controle de cozinha (*Pendente, Cozinhando, Pronto*) e Ponto de Venda (PDV) para balcão.

---

## 📁 Estrutura do Repositório

```
D:\delivery\
├── painel-admin/               # Backend central em Laravel 10 (PHP 8.1+ / 8.2)
├── app-usuario/                # Aplicativo do Cliente em Flutter 3.x (Android, iOS & Web)
├── app-entregador/             # Aplicativo do Entregador em Flutter 3.x (Android & iOS)
├── app-restaurante/            # Aplicativo do Restaurante / PDV em Flutter 3.x (Android & iOS)
├── design-assets/              # Materiais visuais e de marketing
│   ├── icons/                  # Conjuntos de ícones em todas as resoluções
│   ├── landing-page/           # Banners e ilustrações da página de apresentação
│   ├── logos/                  # Variações oficiais da marca em alta resolução e .psd
│   ├── screenshots/            # Registros de telas do sistema em funcionamento real
│   ├── stock-photos/           # Fotografias profissionais de suporte
│   └── templates-vetores/      # Arquivos editáveis em Illustrator (.ai, .eps)
├── docs/                       # Documentação técnica e operacional
│   ├── DOCUMENTACAO_SISTEMA.md # Manual técnico detalhado da arquitetura
│   └── credenciais.example.txt # Modelo de referência com placeholders seguros
├── .gitignore                  # Proteção estrita contra upload de credenciais e caches
└── README.md                   # Este documento de referência rápida
```

---

## ⚙️ Pré-requisitos do Ambiente

Para executar e compilar todos os módulos do projeto, sua máquina deve possuir:

| Ferramenta | Versão Recomendada | Utilização |
| :--- | :--- | :--- |
| **PHP** | `8.1` ou `8.2` (com extensões `pdo_mysql`, `curl`, `mbstring`, `openssl`, `gd`, `zip`, `bcmath`) | Backend Laravel |
| **Composer** | `2.x` | Gerenciador de dependências PHP |
| **MySQL / MariaDB** | `5.7+` ou `10.4+` | Banco de dados relacional |
| **Flutter SDK** | `>= 3.2.1 < 4.0.0` (Dart 3) | Aplicativos Mobile e Web |
| **Android Studio** | Versão recente (com Android SDK 34 e Java 17) | Compilação Android |
| **Git** | Versão recente | Controle de versão |

---

## 🛠️ Instalação Pós-Clone (Guia Passo a Passo)

### Passo 1: Clonar o Repositório

```bash
git clone https://github.com/christiansousadev/AgoraPronto-Delivery.git
cd AgoraPronto-Delivery
```

---

### Passo 2: Configurar Arquivos Ignorados (.gitignore)

> [!IMPORTANT]
> Por questões rigorosas de segurança, o repositório **não contém credenciais de produção, senhas de banco ou chaves privadas**.
> Antes de executar o projeto, você deve configurar os seguintes arquivos locais:

#### Arquivos que você precisará providenciar:

1. **Backend (`painel-admin/`):**
   * Criar o arquivo `.env` a partir do modelo seguro:
     ```bash
     cd painel-admin
     cp .env.example .env
     ```
   * Adicionar o arquivo JSON da conta de serviço do Firebase em:
     `painel-admin/storage/app/firebase/firebase_credentials.json`
2. **Aplicativos Flutter (`app-usuario/`, `app-entregador/`, `app-restaurante/`):**
   * Inserir o arquivo de configuração Android do Firebase (`google-services.json`) em:
     * `app-usuario/android/app/google-services.json`
     * `app-entregador/android/app/google-services.json`
     * `app-restaurante/android/app/google-services.json`
   * *(Opcional - apenas para iOS)* Inserir o `GoogleService-Info.plist` em:
     * `app-usuario/ios/Runner/GoogleService-Info.plist`

*(Consulte o modelo em [docs/credenciais.example.txt](docs/credenciais.example.txt) para visualizar todos os parâmetros)*.

---

### Passo 3: Configurar e Rodar o Backend (Laravel)

1. Acesse o diretório do painel:
   ```bash
   cd painel-admin
   ```
2. Instale as dependências PHP via Composer:
   ```bash
   composer install
   ```
3. Gere a chave única da aplicação no `.env`:
   ```bash
   php artisan key:generate
   ```
4. Configure os acessos ao banco de dados MySQL no arquivo `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=u730142489_agorapronto
   DB_USERNAME=seu_usuario_mysql
   DB_PASSWORD=sua_senha_mysql
   ```
5. Crie a base de dados no seu servidor MySQL (ex: via phpMyAdmin ou CLI):
   ```sql
   CREATE DATABASE IF NOT EXISTS `u730142489_agorapronto` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
6. Execute as migrações estruturais e o seeder do administrador:
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=AdminSeeder --force
   ```
7. Crie o link simbólico do storage de arquivos:
   ```bash
   php artisan storage:link
   ```
8. Inicie o servidor local:
   ```bash
   php artisan serve
   ```
   * O painel estará disponível em: `http://127.0.0.1:8000/admin`
   * **Usuário Padrão:** `admin@admin.com`
   * **Senha Inicial:** `12345678` *(altere na primeira sessão em Configurações de Perfil)*

---

### Passo 4: Configurar e Compilar os Aplicativos (Flutter)

Execute os procedimentos abaixo para cada aplicativo (`app-usuario`, `app-entregador` e `app-restaurante`):

#### 1. Definir o Domínio do seu Backend
Abra o arquivo `lib/util/app_constants.dart` de cada app e defina a URL do seu servidor (sem barra `/` no final):
```dart
class AppConstants {
  static const String appName = 'AgoraPronto'; // ou 'AgoraPronto Entregador' / 'AgoraPronto Restaurante'
  static const String baseUrl = 'https://seudominio.com.br'; // ou 'http://10.0.2.2:8000' para emulador Android
  // ...
}
```

#### 2. Baixar Dependências
```bash
cd app-usuario    # ou app-entregador / app-restaurante
flutter pub get
```

#### 3. Executar em Modo de Desenvolvimento (Debug)
Com um emulador aberto ou dispositivo físico conectado via USB com depuração ativada:
```bash
flutter run
```

---

## 🔑 Guia de Configuração de Credenciais & APIs

### Google Maps Platform
Necessário para busca de endereços, autocompletar, cálculo de distância de entrega e mapas em tempo real.
* **APIs Obrigatórias a ativar no Google Cloud Console:**
  1. *Places API*
  2. *Directions API*
  3. *Distance Matrix API*
  4. *Geocoding API*
  5. *Maps SDK for Android*
  6. *Maps SDK for iOS*
* **Onde Inserir a Chave:**
  * **Painel Admin:** No painel web (`/admin`), em *Business Settings* -> *Third Party APIs* -> *Map API Key*.
  * **Android (`app-*/android/app/src/main/AndroidManifest.xml`):**
    ```xml
    <meta-data android:name="com.google.android.geo.API_KEY" android:value="SUA_CHAVE_AQUI"/>
    ```
  * **iOS (`app-*/ios/Runner/AppDelegate.swift`):**
    ```swift
    GMSServices.provideAPIKey("SUA_CHAVE_AQUI")
    ```
  * **Web (`app-usuario/web/index.html`):**
    ```html
    <script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_AQUI"></script>
    ```

---

### Firebase & Push Notifications (FCM v1)
Usado para envio instantâneo de alertas de pedidos para clientes, cozinhas e entregadores.
* **Backend:**
  1. Acesse o [Firebase Console](https://console.firebase.google.com/).
  2. Em *Configurações do Projeto* -> *Contas de Serviço*, clique em **Gerar Nova Chave Privada**.
  3. Salve o arquivo JSON baixado em:
     `painel-admin/storage/app/firebase/firebase_credentials.json`
* **Aplicativos Android:**
  1. Adicione os aplicativos Android no mesmo projeto Firebase com seus respectivos pacotes:
     * Cliente: `com.agorapronto.user`
     * Entregador: `com.agorapronto.entregador`
     * Restaurante: `com.agorapronto.restaurante`
  2. Baixe o `google-services.json` gerado para cada app e coloque na pasta `android/app/` do respectivo projeto.

---

### Google reCAPTCHA
Utilizado no painel web e formulários de autenticação para proteção contra bots.
* No Google reCAPTCHA Console, registre seu domínio e obtenha a **Site Key** e **Secret Key** (v2 ou v3).
* Configure no arquivo `.env` do backend:
  ```env
  RECAPTCHA_SITE_KEY=sua_site_key_aqui
  RECAPTCHA_SECRET_KEY=sua_secret_key_aqui
  ```

---

### Assinatura de Release Android (Keystore)
Para gerar APKs ou App Bundles (AAB) assinados para a Google Play Store:
1. Gere seu arquivo keystore (se ainda não possuir):
   ```bash
   keytool -genkey -v -keystore your-keystore-name.jks -keyalg RSA -keysize 2048 -validity 10000 -alias agorapronto
   ```
2. Crie o arquivo `key.properties` dentro da pasta `android/` do aplicativo com os dados:
   ```properties
   storePassword=sua_senha_store
   keyPassword=sua_senha_key
   keyAlias=agorapronto
   storeFile=../your-keystore-name.jks
   ```
   *(Este arquivo já está protegido pelo `.gitignore`)*.

---

## 📦 Resumo dos Comandos de Build

### Compilar APK Release (Otimizado por Arquitetura)
Gera pacotes menores e otimizados (`app-arm64-v8a-release.apk`, `app-armeabi-v7a-release.apk`):
```bash
flutter build apk --target-platform android-arm,android-arm64,android-x64 --split-per-abi --release
```
* O arquivo gerado estará em: `build/app/outputs/flutter-apk/`

### Compilar App Bundle para Google Play (.aab)
```bash
flutter build appbundle --release
```
* O arquivo gerado estará em: `build/app/outputs/bundle/release/app-release.aab`

### Compilar Versão Web do Usuário (PWA)
```bash
flutter build web --web-renderer html --release
```
* Os arquivos gerados estarão em: `build/web/` (prontos para hospedagem em Apache, Nginx ou subdomínio).

---

## 📚 Documentação Adicional

* 📄 **[Documentação Completa da Arquitetura](docs/DOCUMENTACAO_SISTEMA.md)**: Mapeamento de todas as rotas de API REST, migrações de banco e diagramas técnicos.
* 📋 **[Modelo de Credenciais](docs/credenciais.example.txt)**: Exemplo estruturado de variáveis de ambiente com placeholders seguros (sem credenciais sensíveis).

---

## 👨‍💻 Desenvolvedor & Suporte

* **Desenvolvedor:** Christian Sousa
* **E-mail:** `christiansousadev@gmail.com`
* **Licença:** Proprietária — Todos os direitos reservados.
