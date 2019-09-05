// /client/App.js
import React, { useState } from 'react';
// import axios from 'axios';

interface DBProps {
  data: Array<string>,
  id: number,
  message: string | null,
  intervalIsSet: boolean,
  idToDelete: boolean | null,
  idToUpdate: boolean | null,
  objectToUpdate: boolean | null,
}

const Database: React.FC = () => {
    let primary_state = {
        data: [],
        id: 0,
        message: null,
        intervalIsSet: false,
        idToDelete: null,
        idToUpdate: null,
        objectToUpdate: null,
    };

    const [state, setState] = useState<DBProps>(primary_state)
  

  // just a note, here, in the front end, we use the id key of our data object
  // in order to identify which we want to Update or delete.
  // for our back end, we use the object id assigned by MongoDB to modify
  // data base entries

  // our first get method that uses our backend api to
  // fetch data from our data base
  const getDataFromDb = () => {
    fetch('http://localhost:8000/api/getData')
      .then((data) => data.json())
      .then((res) => {
        console.log(res)
        setState({ ...res })
      });
  };


//   const putDataToDB = (message: any) => {
//     let currentIds = state.data.map((data) => data);
//     let idToBeAdded = 0;
//     while (currentIds.includes(idToBeAdded)) {
//       ++idToBeAdded;
//     }

//     axios.post('http://localhost:3001/api/putData', {
//       id: idToBeAdded,
//       message: message,
//     });
//   };

//   // our delete method that uses our backend api
//   // to remove existing database information
//   deleteFromDB = (idTodelete) => {
//     parseInt(idTodelete);
//     let objIdToDelete = null;
//     this.state.data.forEach((dat) => {
//       if (dat.id == idTodelete) {
//         objIdToDelete = dat._id;
//       }
//     });

//     axios.delete('http://localhost:8000/api/deleteData', {
//       data: {
//         id: objIdToDelete,
//       },
//     });
//   };

//   // our update method that uses our backend api
//   // to overwrite existing data base information
//   updateDB = (idToUpdate, updateToApply) => {
//     let objIdToUpdate = null;
//     parseInt(idToUpdate);
//     this.state.data.forEach((dat) => {
//       if (dat.id == idToUpdate) {
//         objIdToUpdate = dat._id;
//       }
//     });

//     axios.post('http://localhost:8000/api/updateData', {
//       id: objIdToUpdate,
//       update: { message: updateToApply },
//     });
//   };

//   // here is our UI
//   // it is easy to understand their functions when you
//   // see them render into our screen
    return (
      <div>
        <button onClick={() => getDataFromDb()}>get data</button>
        <ul>
          {state.data.length <= 0
            ? 'NO DB ENTRIES YET'
            : state.data.map((dat:any) => (
                <li style={{ padding: '10px' }} key={`state.data.message`}>
                  <span style={{ color: 'gray' }}> id: </span> {dat.id} <br />
                  <span style={{ color: 'gray' }}> data: </span>
                  {dat.message}
                </li>
              ))}
        </ul>
        {/* <div style={{ padding: '10px' }}>
          <input
            type="text"
            onChange={(e) => setState({ message: e.target.value })}
            placeholder="add something in the database"
            style={{ width: '200px' }}
          />
          <button onClick={() => putDataToDB(this.state.message)}>
            ADD
          </button>
        </div> */}
        {/* <div style={{ padding: '10px' }}>
          <input
            type="text"
            style={{ width: '200px' }}
            onChange={(e) => setState({ idToDelete: e.target.value })}
            placeholder="put id of item to delete here"
          />
          <button onClick={() => deleteFromDB(this.state.idToDelete)}>
            DELETE
          </button>
        </div> */}
        {/* <div style={{ padding: '10px' }}>
          <input
            type="text"
            style={{ width: '200px' }}
            onChange={(e) => setState({ idToUpdate: e.target.value })}
            placeholder="id of item to update here"
          />
          <input
            type="text"
            style={{ width: '200px' }}
            onChange={(e) => setState({ updateToApply: e.target.value })}
            placeholder="put new value of the item here"
          />
          <button
            onClick={() =>
              updateDB(this.state.idToUpdate, this.state.updateToApply)
            }
          >
            UPDATE
          </button>
        </div> */}
      </div>
    );
}

export default Database;