import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class Welcome extends Component {
    render() {
        return (
            <div>
                { this.props.name }
            </div>
        );
    }
}

class App extends Component {
    render() {
        return (
            <div>
                <Welcome name="Artem" />
            </div>
        );
    }
}

export default App;
