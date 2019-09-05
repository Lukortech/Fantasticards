import React from 'react';
import Database from './containers/db_view/Database';
import './App.scss';



const App: React.FC = () => {
  return (
    <div className="App">
      <div className="container">
        <Database/>
      </div>
    </div>
  );
}

export default App;
