# PROJET IF3A
*Club de Badminton
Derré Yann, Becker Esteban*

## **Table des matières**
[Introduction :	3](#_Toc87269488)
[Organisation :	3](#_Toc87269489)
[Cahier des charges	4](#_Toc87269490)
[Base de données :	5](#_Toc87269491)
[Documentation des tables :	5](#_Toc87269492)
[Relations :	6](#_Toc87269493)
[Site web :	7](#_Toc87269494)
[BDD.php	7](#_Toc87269495)
[menu.php	7](#_Toc87269496)
[index.php :	7](#_Toc87269497)
[connexion.php :	7](#_Toc87269498)
[inscription.php :	7](#_Toc87269499)
[enregistrement.php :	8](#_Toc87269500)
[modifier_profile.php :	8](#_Toc87269501)
[appliquer_modification.php :	8](#_Toc87269502)
[classement_reservation.php :	9](#_Toc87269503)
[licence.php :	9](#_Toc87269504)
[enregistrement_licence.php :	9](#_Toc87269505)
[recherche.php :	9](#_Toc87269506)
[upgrade_admin.php :	9](#_Toc87269507)
[Profile.php	10](#_Toc87269508)
[Aurevoir_reservation.php	11](#_Toc87269509)
[Edit_reservation.php	11](#_Toc87269510)
[Apply_edit.php	12](#_Toc87269511)
[Reservations.php	12](#_Toc87269512)
[Add_réservation.php	14](#_Toc87269513)
[Edit_reservation_admin.php	14](#_Toc87269514)
[DIVERS	14](#_Toc87269515)
[Conclusion	15](#_Toc87269516)

# **Introduction :**
Nous avons choisi le club de badminton car contrairement au projet de banque alimentaire, nous avions directement une idée de comment structurer la base de données lié au site web.

De plus, faisant régulièrement du sport, nous étions plus familiers des sites web liés aux club sportif.
## Organisation :
L’organisation du projet aura été complexe. Nous avons tout de suite défini que nous travaillerons avec GitHub (<https://github.com/derreyann/websiteif3>) plutôt que des outils d’édition de code en simultané. Afin de pouvoir rapidement commencer à se départager les pages web à programmer, on a décidé de construire en premier la base de données afin de l’exporter et de l’a partager sur nos deux postes de travail.

Au début nous avons voulu utiliser Notion, un outil qui permet de faire de la gestion de projet, en faisant par exemple des frises chronologiques pour nous organiser. Mais, malheureusement, par manque de motivation et de rigueur nous avons délaissé l’outil. À la place, nous codions les pages du site quand nous avions du temps libre. Cette méthode possède un défaut majeur, nous avions du mal à nous synchroniser. Il nous est arrivé de commencer à travailler sur la même page avant de nous rendre compte que nous codions la même chose.

De plus, cette organisation trouvera certainement ses limites sur un projet beaucoup plus complexe, où il y a plus d’interactions entre les différentes parties.
# **Cahier des charges**
Voici la liste des fonctions que doit permettre le site web :

1. Permettre à un utilisateur de s’enregistrer
1. Permettre à un administrateur de gérer les profils
1. Permettre à un cotisant de réserver un terrain
1. Permettre à un administrateur de gérer les réservations
1. Permettre à un administrateur d’ajouter une cotisation
1. Permettre aux utilisateurs d’effectuer une recherche par nom ou prénom
1. Permettre à un utilisateur de modifier son profil
1. Permettre à un utilisateur de modifier sa réservation
1. Permettre à l’utilisateur de naviguer le site avec un menu visible en tête de page
# **Base de données :**
Afin de concevoir la base de données nous avons utilisé un diagramme. Il nous a permis d’avoir une vision claire de la base de données ainsi que de vérifier qu’elle correspondait au norme 1NF, 2NF et 3NF.

![](Aspose.Words.7717fa19-8e83-4a51-b961-1ac8c698a24e.001.jpeg)
## Documentation des tables :

Utilisateur : Table qui représente un utilisateur du site

|Nom|Type de valeur|Description|
| - | - | - |
|id|Entier, clé primaire||
|type\_compte|Entier|<p>Définit si un utilisateur est admin</p><p>0 -> admin</p><p>1 -> Utilisateur normal</p>|
|nom|Chaine de caractère||
|prenom|Chaine de caractère||
|mail|Chaire de caractère||
|MdP|Chaine de caractère|Mot de passe hashé avec la fonction PASSWORD de SQL|
|naissance|date||

Licence : Table qui représente la liste de toutes les licences

|Nom|Type de valeur|Description|
| - | - | - |
|user\_id|<p>Entier, clé primaire</p><p>clé étrangère qui fait référence à utilisateur.id</p>||
|date\_souscription|date|Date à laquelle l’utilisateur à commencer sa licence|
|durée|int|Durée de la licence en jour|

Réservation : Table de jointure entre terrain et utilisateur qui représente une réservation par un utilisateur

|Nom|Type de valeur|Description|
| - | - | - |
|id\_user\_1|<p>Entier</p><p>clé étrangère qui fait référence à utilisateur.id</p>|Utilisateur qui effectue la réservation|
|id\_user\_2|<p>Entier</p><p>clé étrangère qui fait référence à utilisateur.id</p><p>Optionnel</p>|Utilisateur avec qui la réservation est effectué (Peut rester vide) |
|id\_terrain|clé étrangère qui fait référence à terrain.id|Terrain réservé|
|date|date|Date de la réservation|
|h\_debut|Entier|Horaire de la réservation|
|durée|Entier|Durée de la réservation en heure|

Terrain : Table qui représente les terrains

|Nom|Type de valeur|Description|
| - | - | - |
|id|Entier, clé primaire|Id du terrain|

## Relations :
- Souscrit : relation 1:N 

Relie un utilisateur avec toutes les licences qu’il a souscrit.

- Réserve : relation N:M

Relie un utilisateur aux terrains qu’il a réservé en utilisant une table de jointure.
# **Site web :**
## BDD.php
Cette page n’affiche rien, il s’agit uniquement de script php à inclure dans d’autres pages.

Le scripte effectue la connexion à la base de données. Avoir une seule page permet de modifier les paramètres de connexion à la base de données à un seul endroit pour tout le site.

La fonction « iscotisant » renvoie TRUE ou FALSE si l’utilisateur en cotisant en fonction de son id.
## menu.php
Cette page affiche un menu en haut du site web.

« menu.css » Permet d’afficher les option du menu cote à cote.
## index.php :
Cette page est composée d’un formulaire demandant les informations de connexion d’un utilisateur et d’un bouton vers la page inscription.php.

Quand le formulaire est soumis il renvoie vers la page connexion.php.

La page permet d’afficher un message d’erreur en l’incluant dans le lien.
## connexion.php :
La page vérifie si les informations rentrées dans le formulaire de index.php sont dans la base de données.

Si elles sont correctes, la page crée une session avec les identifiants de connexion et redirige vers profile.php

Si elles sont fausses, la page renvoie vers index.php avec un message d’erreur
## inscription.php :
Cette page est composée d’un formulaire demandant les informations d’inscription d’un utilisateur en utilisant les vérifications de format des données entrées.


Quand le formulaire est soumis il renvoie vers la page enregistrement.php.

La page permet d’afficher un message d’erreur en l’incluant dans le lien.
## enregistrement.php :
Cette page est un scripte php qui vérifie si l’adresse e-mail existe déjà dans la base de données.

Si elle existe elle renvoie vers inscription.php avec un message d’erreur.

Si elle n’existe pas, les informations du formulaire sont ajoutées dans la base de données. Une session est créée et le la page renvoie vers profile.php.
## modifier\_profile.php :
Cette page affiche le formulaire qui permet de modifier un profile.

Si aucun id n’est indiqué dans l’url, la page modifie le profil de l’utilisateur actuellement connecté. Si aucun utilisateur est connecté, la page renvoie vers index.php avec un message d’erreur

Si l’id d’un utilisateur est indiqué dans l’url, la page vérifie que l’id existe réellement. Si l’utilisateur n’existe pas la page affiche un message d’erreur.

Elle va aussi vérifier si l’utilisateur connecté est un administrateur. Si l’utilisateur n’est pas un administrateur, la page va rediriger vers index.php avec un message d’erreur.

La page est constituée d’un formulaire où les champs sont préremplis avec les informations de l’utilisateur.

Le bouton de soumission de formulaire renvoie vers appliquer\_modification.php
## appliquer\_modification.php :
Cette page effectue la mise a jour dans la base de données des informations rentré dans modifier\_profile.php

Elle va d’abord vérifier que l’utilisateur qui effectue la requête a bien les autorisations nécessaires, sinon, la page affichera un message d’erreur.

Si l’utilisateur a bien les autorisations la page effectue les modifications et renvoie vers profile.php
## classement\_reservation.php :
Cette page affiche le classement des utilisateurs ayant le plus de réservations

Elle effectue une requête SQL dans la base de données en groupant les résultats par id et en les classant par ordre décroissant.
## licence.php :
La page vérifie que l’utilisateur connecté est un administrateur et que l’utilisateur à qui on veut ajouter une licence existe et ne soit pas cotisant. Si ces critères ne sont pas réunie la page affiche un message d’erreur.

Il s’agit d’un simple formulaire qui demande la durée de la licence et le bouton de soumission renvoie vers enregistrement\_licence.php
## enregistrement\_licence.php :
Cette page vérifie que l’utilisateur connecté est un admin, si l’utilisateur n’est pas admin elle renvoie un message d’erreur.

Un fois la vérification effectuée, elle ajoute la nouvelle licence dans la table licence de la base de données.
## recherche.php :
Cette page vérifie que l’utilisateur est connecté. Elle possède un champ qui permet d’effectuer une cherche dans les noms et les prénoms de la base de données. Une fois le formulaire soumit, la page est actualisée avec la liste des profils avec un nom ou un prénom correspondant.



Chaque un de ces résultats permet d’être redirigé vers la page de l’utilisateur en cliquant dessus.
## upgrade\_admin.php :
Cette page vérifie que l’utilisateur connecté est admin puis modifie le type de profile de l’utilisateur dont l’id est dans l’url.

Cette page est la page d’arrivée après la connexion. Elle permet à l’utilisateur de consulter ses réservations et de consulter ses informations. Elle recherche dans la base de données les informations de réservations possédant l’id de la session utilisateur en tant qu’id\_user\_1 de la table réservations.

Une boucle while dans le tableau se charge ensuite d’afficher chaque résultat.

Une difficulté rencontrée était d’afficher des boutons d’édition et de suppression afin que l’utilisateur altère sa réservation. Pour y remédier, nous avons utilisé des formulaires cachés pour transmettre les données de la ligne. 


Les boutons visibles ne sont finalement que les submits des formulaires invisibles. Nous réutiliserons les données dans les différentes pages d’édition et de suppression.

Le profil dispose également d’une section historique, affichant les réservations effectuées à une date antérieur à celle de l’horloge du serveur.
## Aurevoir\_reservation.php
Cette page se charge simplement de supprimer la ligne dont les données correpondent à celles du formulaire invisible renvoyé dans profile.php


## Edit\_reservation.php
Cette page est une page d’édition d’une ligne de réservation de profile.php. Le formulaire est pré-rempli avec les valeurs transmises par un formulaire invisible. Puis les nouvelles valeurs sont renvoyées à la page apply\_edit.php. Un utilisateur lambda voit la première case désactivée, s’agissant de la personne ayant fait la réservation. 

## Apply\_edit.php
Recherche les informations des emails utilisateurs rentrés dans le formulaire, puis insère les IDs des utilisateurs correspondants dans la base de donnée. La philosophie adoptée pour le stockage et l’affichage des utilisateurs est d’effectuer une conversion email-id à l’input, et id-nom à l’affichage dans tous les formulaires. 

## Reservations.php
Réservation.php est une autre page principale du site, où les utilisateurs connectés peuvent consulter les réservations en cours, et faire une nouvelle réservation. Le tableau d’affichage est virtuellement le même que celui de profile.php, mais celui-ci recherche tous les enregistrements disponibles.

Un formulaire permet de rajouter une nouvelle réservation, renvoyant à la page add\_réservations. Si un utilisateur souhaite ramener des invités, il peut laisser le champ vide.

Check du type\_compte dans la table utilisateur (visible aux administrateurs uniquement)


Pour les administrateurs, la page propose de modifier et de supprimer les réservations, en redirigeant vers une page d’édition spéciale. 

## Add\_réservation.php
Cette page vérifie que le créneau demandé est bien disponible en recherchant les réservations sur la date dans la période indiquée. 

Cette page effectue une conversion des emails rentrés pour obtenir leurs ids respectifs, puis insère une nouvelle ligne dans la base de données réservations avec ces données.

Elle redirige ensuite vers profile.php 
## Edit\_reservation\_admin.php
Pour les comptes administrateurs, il faut pouvoir modifier si besoin les réservations des utilisateurs, ou bien verrouiller un créneau périodiquement pour un cours par exemple.

La page est essentiellement la même qu’edit\_reservation.php à l’exception de la possibilité de modifier l’auteur de la réservation (accès au champ joueur1), et d’ajouter périodiquement un cours sur un nombre de semaines.

Cette page vérifie le status du compte afin de s’assurer que seuls les administrateurs puissent le modifier. Sinon, il redirige vers le profil.
## DIVERS
Nous avons expérimenté avec le CSS. Vers la fin du projet, nous avons décidé de donner un style aux formulaires et tableaux sur les pages. N’étant pas complètement familier avec la syntaxe, l’utilisation de stylesheets est encore très maladroite. Le résultat obtenu permet tout de fois une meilleure prise en main du site web. 
# **Conclusion**
Nous avons finalement réussi à concevoir un site web fonctionnel, utilisable par des utilisateurs lambda au travers d’une interface compréhensible et d’un contrôle des entrées utilisateurs.

Les problèmes organisationnels peuvent cependant poser problème sur des projets de plus grande ampleur, une répartition du travail plus équitable au cours du temps pouvant empêcher des sessions de code trop longues.

Ce projet nous a permis de devenir à l’aise avec la construction et l’interaction sql-php. Nous aurons également appris à se mettre à la place de l’utilisateur afin de concevoir des fonctions attendues d’un produit comme ce site de réservation.

Ces compétences pourront être réutilisées dans le futur, même si le langage/contexte utilisé diffère.
