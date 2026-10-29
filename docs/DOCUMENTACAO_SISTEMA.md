# Documentação Completa do Sistema de Delivery (AgoraPronto Delivery)

> **Data da Documentação:** Outubro de 2026  
> **Identidade do Projeto:** AgoraPronto Delivery  
> **Desenvolvedor:** Christian Sousa  
> **Ambiente do Projeto:** `D:\delivery\`

---

## 1. Visão Geral do Ecossistema

O projeto contido neste diretório é um ecossistema completo de entrega de comida sob demanda (**Multi-Vendor Food Delivery Platform**), concebido e operado por **Christian Sousa**.

O ecossistema é formado por 4 pilares tecnológicos interligados:

1. **Painel Administrativo & Web Restaurante**: Backend em PHP Laravel 10 (PHP 8.1+ / 8.2), banco de dados MySQL, rotas administrativas, API REST v1/v2, WebSockets, relatórios, sistema financeiro e portal web do lojista.
2. **App do Usuário / Cliente (Mobile & Web)**: Flutter 3.x com GetX, compilável para Android (APK/AAB), iOS e Web.
3. **App do Entregador (Driver)**: Flutter 3.x com GetX, rastreamento por GPS em tempo real e segundo plano, recebimento de pedidos, carteira de repasse e controle de dinheiro em mãos (*Cash in Hand*).
4. **App do Restaurante (Vendor/Cozinha/POS)**: Flutter 3.x com GetX, gestão de catálogo/cardápio, pedidos em tempo real com alerta sonoro contínuo, PDV (Point of Sale) integrado para balcão e gestão de entregadores próprios.

---

## 2. Inventário Estruturado do Projeto

O workspace está organizado de forma modular e limpa:

### 2.1. Código-Fonte dos Aplicativos e Backend

| Diretório | Stack | Finalidade |
| :--- | :---: | :--- |
| **`painel-admin/`** | Laravel 10 / PHP 8.2 | Backend central, APIs REST v1/v2, dashboard administrativo e portal web dos restaurantes. |
| **`app-usuario/`** | Flutter 3.x / GetX | Aplicativo do cliente (Android, iOS e Web). |
| **`app-entregador/`** | Flutter 3.x / GetX | Aplicativo dos motoristas parceiros com rastreamento GPS e alerta sonoro. |
| **`app-restaurante/`** | Flutter 3.x / GetX | Aplicativo operacional para cozinhas e lojistas com PDV integrado. |
| **`releases/`** | Android Package | Contém o APK final compilado pronto para distribuição (`AgoraPronto User.apk`). |
| **`docs/`** | Documentação | Manual técnico de arquitetura e modelos de credenciais sem dados sensíveis. |
| **`design-assets/`** | Design e Mídia | Identidades visuais, logos, artes da landing page, fotos e vetores editáveis. |

---

## 3. Arquitetura dos Sistemas

### 3.1. Painel Admin (`painel-admin/`)
* **Framework:** Laravel 10.x sobre PHP 8.1 / 8.2.
* **Banco de Dados:** MySQL com 298 migrações estruturais (`database/migrations`).
* **Desenvolvedor:** Christian Sousa.
* **Usuário Administrador Principal:**
  * **Nome:** Christian Sousa
  * **E-mail:** `admin@admin.com`
  * **Senha Inicial:** `12345678` *(recomenda-se alteração no primeiro login)*
* **Rotas Principais:**
  * Administrador Geral: `https://seudominio.com/admin`
  * Portal do Restaurante: `https://seudominio.com/vendor`
  * Landing page institucional integrada configurável via painel.
* **Módulos de Pagamento Nativos:**
  * Mercado Pago, Stripe, PayPal, Pix, Dinheiro na Entrega (COD) e Carteira Digital.

---

### 3.2. Aplicativo do Cliente (`app-usuario/`)
* **ID do Pacote / Namespace:** `com.agorapronto.user`
* **Nome de Exibição:** `AgoraPronto`
* **Framework:** Flutter 3.x com GetX.
* **Recursos Principais:**
  * Geolocalização via GPS e busca de endereços no Google Maps.
  * Zonas operacionais por raio e polígonos.
  * Cardápio categorizado, adicionais selecionáveis e observações.
  * Cupons de desconto e carteira de cashback.
  * Chat em tempo real com o restaurante e com o entregador.
  * Rastreamento do pedido com mapa ao vivo.

---

### 3.3. Aplicativo do Entregador (`app-entregador/`)
* **ID do Pacote / Namespace:** `com.agorapronto.entregador`
* **Nome de Exibição:** `AgoraPronto Entregador`
* **Framework:** Flutter 3.x com GetX.
* **Recursos Principais:**
  * Notificações instantâneas de novas corridas com distância e taxa.
  * Navegação integrada com rotas GPS.
  * Confirmação de entrega com código OTP.
  * Fechamento de caixa com conferência de dinheiro coletado (*Cash in Hand*).

---

### 3.4. Aplicativo do Restaurante (`app-restaurante/`)
* **ID do Pacote / Namespace:** `com.agorapronto.restaurante`
* **Nome de Exibição:** `AgoraPronto Restaurante`
* **Framework:** Flutter 3.x com GetX.
* **Recursos Principais:**
  * Alerta sonoro contínuo ao receber novos pedidos.
  * Fluxo de preparação da cozinha (*Pendente -> Confirmado -> Cozinhando -> Pronto para Retirada*).
  * PDV (*Point of Sale*) integrado para pedidos presenciais de balcão.
  * Gestão de itens em estoque e horários de funcionamento.

---

## 4. Guia de Configuração e Execução

### 4.1. Execução do Backend Laravel
1. Certifique-se de usar PHP 8.1+ e MySQL.
2. Copie o arquivo de exemplo:
   ```bash
   cp .env.example .env
   ```
3. Preencha as credenciais do banco de dados no arquivo `.env`.
4. Inicie o servidor:
   ```bash
   php artisan serve
   ```

### 4.2. Compilação dos Aplicativos Flutter
1. Entre na pasta do aplicativo desejado (`app-usuario`, `app-entregador` ou `app-restaurante`).
2. Obtenha as dependências:
   ```bash
   flutter pub get
   ```
3. Gere o APK release otimizado:
   ```bash
   flutter build apk --target-platform android-arm,android-arm64,android-x64 --split-per-abi --release
   ```
4. Gere a versão Web do Usuário:
   ```bash
   flutter build web --web-renderer html --release
   ```

---

## 5. Manutenção e Segurança

* Todas as chaves e dados sensíveis de produção devem ser mantidos exclusivamente nos arquivos `.env` locais e em `storage/app/firebase/firebase_credentials.json`, os quais estão devidamente listados no [`.gitignore`](file:///d:/delivery/.gitignore).
* Para modelos de variáveis de ambiente com placeholders, utilize [docs/credenciais.example.txt](file:///d:/delivery/docs/credenciais.example.txt).
