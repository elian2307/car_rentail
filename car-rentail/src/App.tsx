import Dashboard from "./views/Dashboard";
import "./App.css";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Contact from "./views/Contact";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Dashboard />} />
        <Route path="/contact" element={<Contact />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
