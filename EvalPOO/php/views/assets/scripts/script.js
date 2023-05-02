
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('Pokemon1')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }

    function onlyOne2(checkbox) {
        var checkboxes = document.getElementsByName('Potion1')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }