app.post('/api/billets', (req, res) => {
  const billet = new Billet(req.body);
  billet.save().then(() => res.send('Billet enregistré'));
});

