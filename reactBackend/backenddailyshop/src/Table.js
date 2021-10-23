function Table(props){
  return(
      <>
    
{props.item[0].username}
        {props.item.map(function(data){
          <h1> {data.username}  </h1>
        })}
      </>
  );
}
export default Table;