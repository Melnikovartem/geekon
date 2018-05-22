import Enzyme from 'enzyme';
import Adapter from 'enzyme-adapter-react-16';
Enzyme.configure({ adapter: new Adapter() });

import React from 'react';
import App from './App';

import { shallow } from 'enzyme';

test('arrow test', () => {
    const wrapper = shallow(<App/>);
    // ...
});

test('notMinus test', () => {
    const wrapper = shallow(<App/>);
    // ...
});

test('cycle test', () => {
    const wrapper = shallow(<App/>);
    // ...
});

test('buttonFunction test', () => {
    const wrapper = shallow(<App/>);
    // ...
});

test('buttonValue test', () => {
    const wrapper = shallow(<App/>);
    // ...
});

test('stop test', () => {
    const wrapper = shallow(<App/>);
    // ...
});
