<?php require('partials/head.php');?>
	<h1>Antarctic</h1>
	<script src="public/js/three.js"></script>
		<script src="public/js/OrbitControls.js"></script>
	<script>

	const IMAGE_SRC = 'https://i.imgur.com/Si4k0Ok.png';
	const SIZE_AMPLIFIER = 5;
	const HEIGHT_AMPLIFIER = 0.3;

	var WIDTH;
	var HEIGHT;

	var scene, camera, renderer, controls;
	var data, plane;
	var mesh;

	init();
	var threedImage = 'https://i.imgur.com/Si4k0Ok.png';
	image(threedImage);



	function image(srcin) {
		var image = new Image();
		image.crossOrigin = "Anonymous";
		image.src = srcin;
		image.onload = function() {
			WIDTH = image.width;
			HEIGHT = image.height;

			var canvas = document.createElement('canvas');
			canvas.width = WIDTH;
			canvas.height = HEIGHT;
			var context = canvas.getContext('2d');


			console.log('image loaded');
			context.drawImage(image, 0, 0);
			data = context.getImageData(0, 0, WIDTH, HEIGHT).data;

			console.log(data);

			addPlane();
		}
	}


	function addPlane() {
		scene.remove(mesh);
		// initialize plane
		plane = new THREE.PlaneBufferGeometry(WIDTH * SIZE_AMPLIFIER, HEIGHT * SIZE_AMPLIFIER, WIDTH - 1, HEIGHT - 1);
		plane.castShadow = true;
		plane.receiveShadow = true;

		var vertices = plane.attributes.position.array;
		// apply height map to vertices of plane
		for(i=0, j=2; i < data.length; i += 4, j += 3) {
			vertices[j] = data[i] * HEIGHT_AMPLIFIER;
		}

		var material = new THREE.MeshBasicMaterial({color: 0xFFFFFF, side: THREE.DoubleSide, transparent:true});

		var alphaMap = new THREE.TextureLoader().load(IMAGE_SRC);
		material.alphaMap = alphaMap;
		material.alphaMap.magFilter = THREE.NearestFilter;

		mesh = new THREE.Mesh(plane, material);
		mesh.rotation.x = - Math.PI / 2;
		mesh.matrixAutoUpdate  = false;
		mesh.updateMatrix();

		plane.computeFaceNormals();
		plane.computeVertexNormals();

		scene.add(mesh);
	}



	function init() {

		// initialize camera
		camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, .1, 100000);
		camera.position.set(0, 1000, 0);

		// initialize scene
		scene = new THREE.Scene();

		// initialize directional light (sun)
		var sun = new THREE.DirectionalLight(0xFFFFFF, 1.0);
		sun.position.set(300, 400, 300);
		sun.distance = 1000;
		scene.add(sun);

		var frame = new THREE.SpotLightHelper(sun);
		scene.add(frame);

		// initialize renderer
		renderer = new THREE.WebGLRenderer();
		renderer.setClearColor(0x000000);
		renderer.setPixelRatio(window.devicePixelRatio);
		renderer.setSize(window.innerWidth, window.innerHeight);
		document.body.appendChild( renderer.domElement );

		// initialize controls
		controls = new THREE.OrbitControls(camera, renderer.domElement);
		controls.enableDamping = true;
		controls.dampingFactor = .05;
		controls.rotateSpeed = .1;

		//water
		var wg = new THREE.PlaneGeometry( 50000, 50000, 1,1 );
		var wmat = new THREE.MeshBasicMaterial( {color: 0x006994, side: THREE.DoubleSide} );
		var w = new THREE.Mesh( wg, wmat );
		w.rotation.x = -Math.PI / 2;
		w.position.y = -5;
		scene.add( w);
		animate();
	}

	function animate() {
		requestAnimationFrame(animate);
		renderer.render(scene, camera);
		controls.update();
	}

	</script>
<?php require('partials/footer_slider.php');?>
