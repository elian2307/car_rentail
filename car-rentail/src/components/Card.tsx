import { useState } from "react";

export default function Card() {
    //React Hooks
    const [contadorState, setContadorState] =useState(0);
    const aumentar = () => {
        console.log("Hola ", contadorState);
        setContadorState(contadorState + 1);
    }
    return(
    <>
        <h1>Card {contadorState}</h1>
        <button onClick={aumentar}>Hola</button>
    </>
    )

}