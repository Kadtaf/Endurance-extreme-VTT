
---

## 🖼️ Maquette HTML/CSS

La maquette respecte les règles d’un wireframe clair :
- `header` : logo, navigation responsive (menu burger)
- `section` : produit phare, témoignages, à propos
- `form` : formulaire d’inscription newsletter
- `footer` : mentions légales, réseaux sociaux

### Charte respectée :
- Couleurs : `#FF5A00`, `#3A2E1E`, `#F5F0E6`, `#000000`
- Police : Roboto thin (Google Fonts)
- Responsive mobile via media queries

---

## 📬 Formulaire de Newsletter

Formulaire accessible et fonctionnel :
- **Champs requis** : prénom, nom, email
- **Validation côté navigateur** : HTML5 + JS (`pattern`, `type=email`)
- **Validation côté serveur** : filtres, regex, anti-spam
- **CSRF token** inclus
- Affichage de **messages de succès/erreur** dynamiques
- Fallback **PHP** sans JavaScript (message flash)

### Technologies utilisées :
- `HTML5` / `CSS3`
- `JavaScript` (vanilla)
- `PHP 8+` (form.php, csrf.php, message.php)

---

## 🔐 Sécurité

- ✅ Token CSRF (via `csrf.php`)
- ✅ Validation stricte côté client et serveur
- ✅ Anti-spam (temps minimal entre deux soumissions)
- ✅ Headers sécurisés (`X-Content-Type-Options`, `nosniff`)
- ✅ Redirection propre après validation (sans données sensibles en URL)

---

## Accessibilité

- `aria-*` : pour les boutons, notifications, formulaire
- Contraste respecté
- Navigation clavier compatible
- `aria-live` pour message dynamique après envoi

---

## ✨ Fonctionnalités JavaScript

- ✅ Menu burger responsive (fermeture avec clic extérieur ou ESC)
- ✅ Formulaire AJAX avec feedback instantané
- ✅ Bouton flottant "Retour en haut"
- ✅ Notifications dynamiques (succès/erreur)
- ✅ Message flash en PHP en cas d'absence de JS

---

## 🧪 Test JS activé vs désactivé

| Fonction                     | Avec JS ✅   | Sans JS ✅ |
|------------------------------|--------------|-------------|
| Envoi AJAX                   | Oui          | Non         |
| Message dynamique JS         | Oui          | Non         |
| Fallback PHP avec redirection| Non          | Oui avec quelques modifications (index.html-->index.php)|

---

## Captures sont inclus dans la partie 3 du document

- Arborescence du projet (VS Code)
- Formulaire rempli
- Message de succès JS
- Message d’erreur (email invalide)
- Version mobile (menu burger ouvert)

---

## Évolutions possibles

Ce projet est une base fonctionnelle. Il pourrait évoluer comme suit :

1. **Connexion à une base de données** (ex : SQLite, MySQL) pour stocker les inscrits.
2. **Ajout d’une page “confirmation” dédiée** après l’inscription.
3. **Internationalisation (FR/EN)** du formulaire et du site.
4. **Envoi d’e-mail automatique** de bienvenue après inscription (PHP `mail()` ou service externe).
5. **Tableau de bord d’administration** (PHP ou JS) pour voir les inscrits.
6. **Système de validation double opt-in** (lien de confirmation par e-mail).
7. **Transition vers un framework** (Laravel, Symfony, ou Vue/React pour le frontend).

---

## ✅ Déploiement local

1. Copier le projet dans un dossier WAMP/XAMPP
2. Définir un virtualhost ex : `endurance-extrem-vtt.local` avec Apache ( j'ai utilisé wampServer)
3. S'assurer que `.htaccess` est actif (`AllowOverride All`)
4. Accéder via `http://endurance-extrem-vtt.local`

---

## 📄 Auteur

Projet réalisé, dans le cadre d’un devoir de validation / démonstration de compétences front-end et back-end basiques.

---

## Licence

Projet à but pédagogique – non destiné à un usage en production.
