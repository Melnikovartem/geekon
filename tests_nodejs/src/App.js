import React, {Component} from 'react';

class Arrow extends Component {
    render() {
        let s = {width: '40px', height: '40px', display: 'flex',
            justifyContent: 'center', alignItems: 'center',
            fontSize: '30px', border: '1px solid gray'};
        const clickHandle = () => {
            if (this.props.up) this.props.click(1);
            else this.props.click(-1);
        };
        if (this.props.disabled) {
            s.color = 'gray';
            return (
                <div style={s} onClick={clickHandle} className="Arrow">
                    { this.props.up ? "/\\" : "\\/" }
                </div>
            );
        } else {
            return (
                <div style={s} onClick={clickHandle} className="Arrow">
                    { this.props.up ? "/\\" : "\\/" }
                </div>
            );
        }
    }
}

class Digit extends Component {
    render() {
        let s = {margin: '5px', display: 'flex', flexDirection: 'column',
            justifyContent: 'space-between', alignItems: 'center'};
        let s2 = {width: '40px', height: '40px', border: '1px solid gray',
            display: 'flex', justifyContent: 'center', alignItems: 'center'};
        return (
            <div style={s} className="Digit">
                <Arrow up={true} disabled={this.props.disabled}
                       click={this.props.update}/>
                <div style={s2}>
                    {this.props.value < 10 ? "0" + this.props.value : this.props.value}
                </div>
                <Arrow disabled={this.props.disabled}
                       click={this.props.update}/>
            </div>
        );
    }
}

class Timer extends Component {
    constructor(props) {
        super(props);
        this.state = {
            go: false,
            h: 0,
            m: 5,
            s: 0
        };
        this.interval = -1;
        this.toggleTimer = this.toggleTimer.bind(this);
        this.tick = this.tick.bind(this);
    }
    updateCounter(sector) {
        return (x) => {
            this.setState((prev, props) => {
                let su = {};
                su[sector] = prev[sector] + x;
                return su;
            });
        };
    }
    toggleTimer() {
        this.setState((prev, props) => {
            if (prev.go) {
                clearInterval(this.interval);
            } else {
                this.interval = setInterval(this.tick, 1000);
            }
            return {go: !prev.go}
        });
    }
    tick() {
        this.setState((prev, props) => {
            if (prev.go && (!prev.h && !prev.m && !prev.s)) {
                this.toggleTimer();
                return {};
            }
            let su = {h: prev.h, m: prev.m, s: prev.s};
            if (su.s) su.s--;
            else {
                su.s = 59;
                if (su.m) su.m--;
                else {
                    su.m = 59;
                    if (su.h) su.m--;
                }
            }
            return su;
        });

    }
    render() {
        let s = {margin: '10px', border: '1px solid gray', display: 'inline-flex',
            alignItems: 'center'};
        let sb = {margin: '8px', backgroundColor: 'red', padding: '8px'};
        return (
            <div style={s} className="Timer">
                <Digit update={this.updateCounter('h')} disabled={this.state.go} value={this.state.h}/>
                <Digit update={this.updateCounter('m')} disabled={this.state.go} value={this.state.m}/>
                <Digit update={this.updateCounter('s')} disabled={this.state.go} value={this.state.s}/>
                <div style={sb} onClick={this.toggleTimer}>
                    { this.state.go ? "Stop" : "Go"}
                </div>
            </div>
        );
    }
}

class App extends Component {
    render() {
        return (
            <div>
                <Timer/>
            </div>
        );
    }
}

export default App;
export {Timer, Digit, Arrow};
