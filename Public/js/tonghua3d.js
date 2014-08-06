 var renderer,scene, dae, cube, dae2, camera,controls, projector, ray;
 var flag = 0;
$(function(){
    if (!Detector.webgl) Detector.addGetWebGLMessage();//检测浏览器是否支持webgl
    var skin;
    var width = 1025,
        height = 550;
    var loader = new THREE.ColladaLoader();
    //添加场景
    scene = new THREE.Scene();
    //添加轨迹球控制的camra
    camera = new THREE.PerspectiveCamera(40, width/height, 1, 10000);
    camera.position.x = 162;
    camera.position.y = 69;
    camera.position.z = -486;
    camera.lookAt({x:0, y:0, z:0});
    // object picking
     ray = new THREE.Raycaster();
     projector = new THREE.Projector();

    controls = new THREE.TrackballControls(camera);
    scene.add(camera);
    loader.options.convertUpAxis = true;
    loader.load('models/10.txt', function colladaReady(collada) {
        dae2 = collada.scene;
        $('#loadingmode').text('正在加载部件')
        skin = collada.skins[0];
        dae2.scale.x = dae2.scale.y = dae2.scale.z = 0.11;
        scene.add(dae2);
        loader.load('models/222.txt', function colladaReady(collada) {
            $('#loading').hide();
            dae = collada.scene;
            skin = collada.skins[0];
            dae.scale.x = dae.scale.y = dae.scale.z = 0.11;
            dae.updateMatrix();
            scene.add(dae);
            init();
            animate(); 
           // createTips();
        }, function (collada) {
        $('#loagdingtext').text(Math.floor((parseInt(collada.loaded)/parseInt(collada.total))*100) + '%');
        });
    }, function (collada) {
        $('#loagdingtext').text(Math.floor((parseInt(collada.loaded)/parseInt(collada.total))*100) + '%');
    });


function init() {
         //添加Light
         scene.add(new THREE.AmbientLight(0xffffff));
         var light = new THREE.DirectionalLight(0xFFFFFF, 0.6, 100, true);
         light.position.set(200, 200, 100).normalize();
         scene.add(light);
        try{
　　        renderer = new THREE.WebGLRenderer({antialias:true});
        }catch(e){
        　try{
            renderer = new THREE.CanvasRenderer({antialias: true});
          }catch(e){
            alert('您的浏览器不支持html5画布，请升级浏览器至新版本');
          }
       }; 
        renderer.setSize(width,height);
        var container=document.getElementById('container');
        container.appendChild(renderer.domElement);
      //  document.addEventListener( 'mousedown', onDocumentMouseDown, false );
        // events
        var getIntersects = function ( event, object ) {
            var vector = new THREE.Vector3(
                ( event.layerX / container.offsetWidth ) * 2 - 1,
                - ( event.layerY / container.offsetHeight ) * 2 + 1,
                0.5
            );
            projector.unprojectVector( vector, camera );
            ray.set( camera.position, vector.sub( camera.position ).normalize() );
            if ( object instanceof Array ) {

                return ray.intersectObjects( object, true );

            }
            return ray.intersectObject( object, true );
        };

       // var onMouseDownPosition = new THREE.Vector2();
       // var onMouseUpPosition = new THREE.Vector2();

            var PI2 = Math.PI * 2;
            particleMaterial = new THREE.ParticleCanvasMaterial( {
                color: 0x000000,
                program: function ( context ) {
                  context.beginPath();
                  context.arc( 0, 0, 1, 0, PI2, true );
                  context.fill();
                }
            });

            function onDocumentMouseDown( event ) {
                event.preventDefault();
                var vector = new THREE.Vector3( ( event.clientX / window.innerWidth ) * 2 - 1, - ( event.clientY / window.innerHeight ) * 2 + 1, 0.5 );
                projector.unprojectVector( vector, camera );
                var raycaster = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );
                var intersects = raycaster.intersectObjects( scene.children );
                   console.log(intersects);
                if ( intersects.length > 0 ) {                       
                    //intersects[ 0 ].object.material.color.setHex( Math.random() * 0xffffff ); 
                    var particle = new THREE.Particle( particleMaterial );
                    particle.position = intersects[ 0 ].point;
                    particle.scale.x = particle.scale.y = 10;
                    scene.add( particle );
                }               
            }		
		

//        var onMouseDown = function ( event ) {
//            event.preventDefault();
//            onMouseDownPosition.set( event.layerX, event.layerY );
//           //if ( transformControls.hovered === false ) {
//                controls.enabled = true;
//                document.addEventListener( 'mouseup', onMouseUp, false );
//          //  }
//            document.addEventListener( 'mouseup', onMouseUp, false );
//        };

//        var onMouseUp = function ( event ) {
//            debugger;
//            onMouseUpPosition.set( event.layerX, event.layerY );
//            if ( onMouseDownPosition.distanceTo( onMouseUpPosition ) < 1 ) {
//                debugger;
//                var intersects = getIntersects( event, scene.children );
//                if ( intersects.length > 0 ) {
//                    var object = intersects[ 0 ].object;
//                    if ( object.userData.object !== undefined ) {                      
//					// helper
//                    // editor.select( object.userData.object );
//                    } else {
//                    //    editor.select( object );
//                    }//
//                } else {
//                   // editor.select( camera );
//                }
//
//                render();
//
//           }
//            controls.enabled = false;
//            document.removeEventListener( 'mouseup', onMouseUp );
//        };

       // container.addEventListener( 'mousedown', onMouseDown, false );

        

    }



    function animate() {
        //启用渲染
        render();
        //向显卡请求动画帧
        requestAnimationFrame(animate); 
        //renderer.setClearColorHex(0xFFFFFF,1.0);
       // dae.rotation.y += 0.03;
    }

    function render() {
       controls.update();
        //camera.rotation.y += 0.1;
        renderer.render(scene, camera);
    }
});
