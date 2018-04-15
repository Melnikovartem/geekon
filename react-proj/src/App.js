import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class Choose extends Component{

  render(){
    return (
      <div className = "list">
        <h2>{this.props.name}</h2>
        <select ref = { (el)=>{this.el = el;} } onChange = { ()=>{this.props.upd(this.props.name, this.el.value);}}>
          <option value = '1'>Normal</option>
          <option value = '2'>Stone </option>
          <option value = '3'>Pink </option>
          <option value = '4'>Green </option>
          <option value = '5'>Blue </option>
        </select>
      </div>
    )
  }
}

class Stats extends Component{

  render(){
    return(
      <div className = "choosing">
        <Choose name = "leg"  upd = {this.props.upd} />
        <Choose name = "hand" upd = {this.props.upd} />
        <Choose name = "body" upd = {this.props.upd} />
        <Choose name = "head" upd = {this.props.upd} />
        <Choose name = "tail" upd = {this.props.upd} />
      </div>
    )
  }
}

class Elephant extends Component{
  render() {
    return (
    <div className = "elephant">
      <img src = {"photo/leg/" + this.props.leg + ".png"}  className = "leg" ></img>
      <img src = {"photo/hand/" + this.props.hand + ".png"}className = "hand"></img>
      <img src = {"photo/body/" + this.props.body + ".png"}className = "body"></img>
      <img src = {"photo/head/" + this.props.head + ".png"}className = "head"></img>
      <img src = {"photo/tail/" + this.props.tail + ".png"}className = "tail"></img>
    </div>
    )
  }
}


class Block extends Component{

  constructor(props){
    super(props);
    this.update_el = this.update_el.bind(this);
    this.state = {leg: "1", hand: "1", body: "1", head: "1", tail: "1"};
  }

  update_el(part, new_s){
      let state = {};
      state[part] = new_s;
      this.setState(state);
  }

  render(){
    return (
      <div>
        <Elephant leg = { this.state.leg } hand = { this.state.hand } body = { this.state.body } head = { this.state.head } tail = { this.state.tail }/>
        <Stats upd = { this.update_el }/>
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
