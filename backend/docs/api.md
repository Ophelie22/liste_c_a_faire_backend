# Documentation de l'API

| Endpoint | Méthode HTTP | Donnée(s) à transmettre | Description |
|--|--|--|--|
| `/categories` | GET | - | Récupération des données de toutes les catégories |
| `/categories` | POST | name, status | ? |
| `/categories/[id]` | ? | - | Récupération des données de la catégorie dont l'id est fourni |
| `/categories/[id]` | PUT | ? | Mise à jour complète d'une catégorie |
| `/categories/[id]` | PATCH | ? | Mise à jour ?? d'une catégorie |
| `/categories/[id]` | ? | - | Suppression d'une catégorie |
| `/tasks` | GET | - | ? |
| `/tasks` | ? | ? | Ajout d'une tâche |
| `/tasks/[id]` | ? | - | Récupération des données de la tâche dont l'id est fourni |
| `/tasks/[id]` | PUT | title, categoryId, completion, status | ? |
| `/tasks/[id]` | PATCH | title et/ou categoryId et/ou completion et/ou status | ? |
| `/tasks/[id]` | DELETE | - | ? |