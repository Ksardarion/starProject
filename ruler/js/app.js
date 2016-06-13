var camera, renderer, scene, mesh;

window.addEventListener('load', windowLoaded, false);

function windowLoaded() {
	init();
	animate();

}

function init() {
	renderer = new THREE.WebGLRenderer();
	renderer.setSize(window.innerWidth, window.innerHeight);
	document.body.appendChild( renderer.domElement );

	// camera
	camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 1000);
	camera.position.z = 100;

	scene = new THREE.Scene();

	var geometry = new THREE.BoxGeometry(200, 13, 2);

	var texture = THREE.ImageUtils.loadTexture('texture/ruler2.jpg');

	// ?
	texture.anisotropy = renderer.getMaxAnisotropy();

	var material = new THREE.MeshBasicMaterial( { map: texture } );

	mesh = new THREE.Mesh(geometry, material);
	scene.add(mesh);

	window.addEventListener('resize', onWindowResize, false);
}

function onWindowResize() {
	camera.aspect = window.innerWidth / window.innerHeight;

	// ?
	camera.updateProjectionMatrix();
	
	renderer.setSize(window.innerWidth, window.innerHeight);
}

function animate() {
	requestAnimationFrame(animate);

	// mesh.rotation.x += 0.015;
	mesh.rotation.x-= 0.015;

	renderer.render(scene, camera); 
}