

function ecrypt(p,u)
{
	var md = CryptoJS.SHA3(p, { outputLength: 256 }).toString();
	for(var i=0;i<15624;i++)
		md = CryptoJS.SHA3(md, { outputLength: 256 }).toString();
	return (CryptoJS.AES.encrypt(u,md).toString());
}

function dcrypt(p,u)
{
	var md = CryptoJS.SHA3(p, { outputLength: 256 }).toString();
	for(var i=0;i<15624;i++)
		md = CryptoJS.SHA3(md, { outputLength: 256 }).toString();
	var hex = CryptoJS.AES.decrypt(u,md).toString();
	var str = '';
	for (var i = 0; i < hex.length; i += 2)
        str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));  
	return str.toString();

}