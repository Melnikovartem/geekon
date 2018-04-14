import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class Choose extends Component{

  render(){
    return (
      <div className = "list">
        <h2>{this.props.name}</h2>
        <select>
          <option value = '1'>Normal</option>
          <option value = '2'>Stone </option>
        </select>
      </div>
    )
  }
}

class Stats extends Component{

  render(){
    return(
      <div className = "choosing">
        <Choose name = "leg"/>
        <Choose name = "hand"/>
        <Choose name = "body"/>
        <Choose name = "head"/>
        <Choose name = "tail"/>
      </div>
    )
  }
}

class Elephant extends Component{
  render() {
    return (
    <div className = "elephant">
      <img src = {"leg_" + this.props.leg + ".png"}  className = "leg" ></img>
      <img src = {"hand_" + this.props.hand + ".png"}className = "hand"></img>
      <img src = {"body_" + this.props.body + ".png"}className = "body"></img>
      <img src = {"head_" + this.props.head + ".png"}className = "head"></img>
      <img src = {"tail_" + this.props.tail + ".png"}className = "tail"></img>
    </div>
    )
  }
}


class Block extends Component{

  render(){
    return (
      <div>
        <Elephant leg = "1" hand = "1" body = "1" head = "1" tail = "1"/>
        <Stats />
      </div>
    )
  }
}

class App extends Component {
    render() {
        return (
          <div>
            <Block />
          </div>
        );
    }
}

export default App;
