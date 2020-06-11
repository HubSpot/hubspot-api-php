function copyCommand() {
    let field = document.createElement('input')
    field.value = document.getElementById('command').textContent
    
    document.body.appendChild(field)
    field.select()
    
    document.execCommand('copy')
    document.body.removeChild(field)
    
    alert('Copied')
}
