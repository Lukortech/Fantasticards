import React from 'react';
import BasicCard from './components/BasicCard';
import Database from './containers/db_view/Database';
import './App.scss';

const card1 = {
  name:'Card1',
  value:1,
  level:1,
  element:'wind',
  damage:1,
  heal:1,
  effect:'Slows target by 10%',
  description:'This card is no other than other cards',
  image_uri:'https://cdn.pixabay.com/photo/2018/12/17/08/37/fantasy-3879972_960_720.jpg'
}

const App: React.FC = () => {
  return (
    <div className="App">
      <div className="container">
        <BasicCard {...card1}/>
        <Database/>
      </div>
    </div>
  );
}

export default App;
