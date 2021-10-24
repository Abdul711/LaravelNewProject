import axios from 'axios';
import React, { useEffect, useState } from 'react';
import Table from './Table';


function Vendor(){

    const res= axios.get("http://localhost:8000/api/vendor/1");



    
 console.log(res);
return(
    <h1>H</h1>
);
          

 
  



     

 }
 export default Vendor;