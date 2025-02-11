const SearchBar = () => {
    const [query, setQuery] = React.useState('');

    const handleSearch = (e) => {
        e.preventDefault();
        console.log('Searching for:', query);
    };

    return React.createElement('div', { className: 'search-component' },
        React.createElement('form', { onSubmit: handleSearch },
            React.createElement('input', {
                type: 'text',
                value: query,
                onChange: (e) => setQuery(e.target.value),
                placeholder: 'Search for apps...',
                className: 'search-input'
            }),
            React.createElement('button', { type: 'submit' }, 'Search')
        )
    );
};

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('app-search');
    if (container) {
        ReactDOM.render(React.createElement(SearchBar), container);
    }
});