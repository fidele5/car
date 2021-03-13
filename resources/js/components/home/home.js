import React from "react";
import MesUsers from "../users/Users";

const Home = props => ( <
    div className = "container" >
    <
    div className = "users" > { props.children } <
    /div> < /
    div >
);

export default Home;