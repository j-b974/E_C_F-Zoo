set -e
if [ ! -d "/home/ZooJose/.git" ]; then
git clone https://gitlab.com/jb974/ZooJose.git /home/ZooJose
fi
cd /home/ZooJose
git pull origin main
echo "📦 Build de lapplication"
docker compose build
echo "🛑 Arrêt du conteneur existant"
docker compose down || true
echo "🚀 Lancement du nouveau conteneur"
docker compose up -d --force-recreate
echo "✅ Déploiement terminé !"