import './App.css';
import Homepage from './pages/homepage';
import Login from './pages/login'
import Register from './pages/register'
import  { useState}  from 'react';  
function App() {
  const [isLogin, setIsLogin] = useState(false);
  const handleLogin = (e) => {
    setIsLogin(e);
  };
  return (
    <div class = "main">
      
      {isLogin ? (
        <Login />
        
      ) : (
        <Homepage onLogin = {handleLogin} />
      )}
    </div>
    
  );
}

export default App;
