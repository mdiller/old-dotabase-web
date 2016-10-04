from flask import Flask
from dotabase import *
from flask_sqlalchemy import SQLAlchemy

app =  Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///' + dotabase_db
db = SQLAlchemy(app)

@app.route('/')
def root():
    heroes = db.session.query(Hero).all()
    return u"<br>".join([u"{0}: {1}".format(hero.name, hero.icon) for hero in heroes])

if __name__ == '__main__':
    app.run('127.0.0.1', 5000) 