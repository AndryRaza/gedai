# Application Web : GEDAI - Gestion Electronique des Décisions et Arrêtés individuels

## Présentation

Cette application web permettra l’enregistrement, la modification, la recherche et la visualisation d’actes appelés décisions ou arrêtés (documents) au format pdf au sein d’une interface unique.

## Contraintes 

Chaque document doit avoir un numéro d’enregistrement chronologique unique de type 08-01-2021-14. 08 étant le jour, o1 le mois, 2O21 étant l’année, et 14 le n° chronologique.
Il serait apprécié que lors de l’enregistrement le pdf soit marqué avec le n° d’enregistrement. Ex. [CCAS de St-Louis] + [date enregistrement] + [N° enregistrement] en haut de la page de façon centrée.

## Administration des droits 

L’application doit comporter une interface d’administration des droits en création/suppression/modification/visualisation et donner accès à plusieurs types de documents classés par catégorie et sous-catégorie.
Chaque utilisateur est enregistré avec ses : 

- Nom 
- Prénoms
- Fonction
- Mail
- Service 
- Téléphone 

## Interface de visualisation 

L’interface de consultation doit permettre de lister les documents en respectant les droits octroyés (comme dans Agrums), de les visualiser et d’exporter la liste au format csv et via un mail. Deux « sélect » dépendants permettront de choisir de lister les documents voulus et de le visualiser.

## Interface de saisie 

L’interface doit comprendre plusieurs formulaires :

- 1 formulaire de saisie de la nature de l’acte qui est de plusieurs types
- 1 formulaire de saisie des catégorie que l’on appellera « Catégorie d’actes »
- 1 formulaire de saisie des sous-catégorie que l’on appellera « Types d’actes »
- 1 Formulaire de création / modification du destinataire
- 1 Formulaire de saisie des actes : Ce formulaire est le plus important. Il permet d’uploader un document au format pdf et de qualifier celui-ci. Il est nécessaire de visualiser le document pour pouvoir l’enregistrer (Plusieurs informations à saisir se trouvent sur celui-ci).
- Formulaire de recherche selon le même modèle mais sans l’adresse, téléphone, montant et commentaire. Une liste de cibles possibles apparait et on clique pour visualiser. (Ne pas oublier les exports déjà signalées en amont)

## Users stories 

| En tant que  |  je veux | afin de | critères d'acceptations |
|--|--|--|---------|
| Administrateur | créer des comptes| la possibilité à mes employés de se connecter à l'application |  Création d'un compte avec : nom, prénoms, email, mot de passe, service (lors de la création ce champ est vide), téléphone, rôle, état |
|Administrateur | voir les informations d'un utilisateur | voir s'il n'y a pas d'erreur | Récupération des informations de l'utilisateur et voir les fiches qu'il a créées |
| Administrateur | modifier des comptes| corriger s'il y a une erreur de saisie | Récupération des informations du compte afin de modifier les erreurs |
| Administrateur | désactiver des comptes| protéger mon application et ne pas laisser la possibilité à des anciens employés de s'y reconnecter | Récupération de l'id du compte et le désactiver |
| Administrateur | créer des catégories | pouvoir classer les documents | - Création d'une catégorie avec saisie du nom et de l'état |
| Administrateur | modifier des catégories| corriger s'il y a une erreur de saisie | Récupération des informations de la catégorie afin de modifier les erreurs |
| Administrateur | désactiver des catégories| retirer les catégories obsolétes | Récupération de l'id de la catégorie et la désactiver |
| Administrateur | créer des types d'acte | pouvoir classer les documents | - Création d'un type d'acte avec saisie du nom, de la catégorie où il se trouve et de l'état |
| Administrateur | modifier des types d'acte| corriger s'il y a une erreur de saisie | Récupération des informations du type d'acte afin de modifier les erreurs |
| Administrateur | désactiver des types d'acte| retirer les types d'acte obsolétes | Récupération de l'id du type d'acte et le désactiver |
| Administrateur | créer des natures d'acte | pouvoir classer les documents | - Création d'une nature d'acte avec saisie du nom et de l'état |
| Administrateur | modifier des natures d'acte| corriger s'il y a une erreur de saisie | Récupération des informations de la nature d'acte afin de modifier les erreurs |
| Administrateur | désactiver des natures d'acte| retirer les natures d'acte obsolétes | Récupération de l'id de la nature d'acte et la désactiver |
| Administrateur | créer des types de bénéficiaire | pouvoir identifier les différents bénéficiaires | - Création d'un type de bénéficiaire avec saisie du nom et de l'état |
| Administrateur | modifier des types de bénéficiaire| corriger s'il y a une erreur de saisie | Récupération des informations du type de bénéficiaire afin de modifier les erreurs |
| Administrateur | désactiver des types de bénéficiaire | retirer les types de bénéficiaire obsolétes | Récupération de l'id du type de bénéficiaire et le désactiver |
| Administrateur | créer des bénéficiaires | pouvoir cibler les destinataires des actes | - Création d'un bénéficiaire avec : nom, prénoms, adresse, organisme, téléphone fixe (facultatif), téléphone mobile (facultatif), adresse électronique |
|Administrateur | voir les informations d'un bénéficiaire | voir s'il n'y a pas d'erreur | Récupération des informations du bénéficiaire ainsi que les actes dont il est le destinataire |
| Administrateur | modifier des bénéficiaires| corriger s'il y a une erreur de saisie | Récupération des informations du bénéficiaire afin de modifier les erreurs |
| Administrateur | désactiver des bénéficiaires| plus afficher les bénéficiaires lors de la saisie des actes | Récupération de l'id de la nature d'acte et la désactiver |
|Administrateur | voir la liste des actes créés et leurs informations | voir s'il n'y a pas d'erreur | Récupération de la liste des actes et possibilité de cliquer sur un acte pour voir ses informations |
| Administrateur | créer des actes | pouvoir numériser les documents |  Création d'un acte avec : date d'enregistrement, date de l'acte, numéro de l'acte, nature de l'acte, catégorie de l'acte, type d'acte, destinataire, montant de l'aide (facultatif), mots-clés, commentaire, télécharger le pdf sur lequel se trouve les informations à saisir et l'enregistrer en même temps que l'acte |
| Administrateur | modifier des actes| corriger s'il y a une erreur de saisie | Récupération des informations de l'acte afin de modifier les erreurs ou de change le pdf|
| Administrateur | désactiver des actes| d'archiver les actes  | Récupération de l'id de l'acte  et le désactiver |
| Administrateur | pouvoir voir les logs de l'application | voir à l'instant T qui se connecte, qui créé des actes | Afficher les logs propremement en les classant par catégorie : Error, Warning, Info |
| Utilisateur | me connecter à l'application | créer des actes | Connexion avec une adresse électronique et un mot de passe |
| Utilisateur | choisir mon service | voir uniquement les actes de mon service | Afficher les services disponibles et laisser le choix à l'utilisateur à sa connexion | 
| Utilisateur | créer un acte | numériser les documents | Création d'un acte avec : date d'enregistrement, date de l'acte, numéro de l'acte, nature de l'acte, catégorie de l'acte, type d'acte, destinataire, montant de l'aide (facultatif), mots-clés, commentaire, télécharger le pdf sur lequel se trouve les informations à saisir et l'enregistrer en même temps que l'acte |
| Utilisateur | voir mes actes créés | voir les informations et de les vérifier | Afficher que les actes de l'utilisateur |
| Utilisateur | modifier mes actes créés | corriger les erreurs s'il y en a | Récupération des informations de l'acte voulu | 
| Utilisateur | désactiver mes actes créés | archiver les documents | Récupération de l'id de l'acte et le désactiver |
| Administrateur | me déconnecter | protéger mon compte | Supression des informations de session |
| Utilisateur | me déconnecter | protéger mon compte | Supression des informations de session |


## Wireframes

https://www.figma.com/file/sE3ZyEN9llj5Oxx9fxtzXI/GEDAI?node-id=0%3A1

## Trello 

https://trello.com/b/inuBahJt/gedai

## Lien de l'application 

http://gedai.razafin-andry.fr/