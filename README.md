
Pour faciliter le routing du projet, il est indispensable de nommer le dossier contenant le projet "garageVparrot". Il fonctionne particulièrement bien sur Xampp, a mettre dans htdocs. 



La fonctionnalité clashe un peu avec le design, fonctionnel est à mon sens plus important, donc j'ai opté pour avoir un footer tout petit mais donnant les informations demandés tout en gardant la possibilité d'avoir des horaires individuels pour chaque journée ainsi qu'une pause le midi.
Le résultat final est "peu attractif" et c'est un euphémisme. 


Il est nécessaire d'importer ma database carshop.sql pour le bon fonctionnement, deplus il faut donner les droits a un utilisateur de la sorte ;
create user 'carshopuser'@'localhost' IDENTIFIED BY '91827364550' ;

normalement, toutes les fonctionnalités fonctionnent bien sauf le carousel pour montrer les voitures, dans l'idée, il faut lancer le site via index.php et se connecter avec le compte
"Vparrot@gmail.com" et le mot de passe "123456789aA"

Je suis sincèrement désolé du mal de tête que vous allez avoir si vous regardez les fichiers, en l'ayant écrit moi même je me perds de manière systématique vu le nombre de fichiers (beaucoup trop élevés) et la similarité entre les noms, ca peut servir d'exemple de comment NE PAS organiser un fichier, chaque page en contient entre 6 et 12.
