const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

// Connexion à MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',  // Mets ton mot de passe MySQL
  database: 'testdb'  // Mets le nom de ta base
});

db.connect(err => {
  if (err) {
    console.error('Erreur de connexion à MySQL:', err);
  } else {
    console.log('Connecté à MySQL');
  }
});

// Route API pour récupérer les données
app.get('/api/users', (req, res) => {
  db.query('SELECT * FROM users', (err, result) => {
    if (err) {
      res.status(500).send(err);
    } else {
      res.json(result);
    }
  });
});

app.listen(3000, () => {
  console.log('Serveur API démarré sur http://localhost:3000');
});
c