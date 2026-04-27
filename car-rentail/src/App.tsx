import { useState } from 'react'
import Card from "./components/Card"

function App() {
  const [elemento, setElemento] = useState([]) as any
  const [nombre, setNombre] = useState("");
  const aumentar = () => {
    setElemento([...elemento, nombre]);


  }

  return (
    <>
    <h1>{nombre}</h1>
    <input type="text" value={nombre} onChange={(e) => setNombre(e.target.value)} />
    <button onClick={aumentar}>Aumentar</button>
    {
      elemento.map((item: string, index: number) => (
        <Card key={index} />
      ))
    }
    </>
  )
}

export default App
