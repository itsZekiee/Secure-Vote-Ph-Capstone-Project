function geoConfig() {
    return {
        showSearch: false,
        map: null,
        circle: null,
        marker: null,

        init() {
            this.$nextTick(() => {
                if (this.centerLat && this.centerLng) {
                    this.initializeMap();
                }
            });
        },

        getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        this.centerLat = position.coords.latitude.toString();
                        this.centerLng = position.coords.longitude.toString();
                        this.updateMapCenter();
                    },
                    (error) => {
                        console.error('Error getting location:', error);
                        alert('Unable to get your current location. Please enter coordinates manually.');
                    }
                );
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        },

        searchLocation() {
            this.showSearch = !this.showSearch;
        },

        performSearch() {
            const address = document.getElementById('address_search').value;
            if (!address) return;

            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ address: address }, (results, status) => {
                if (status === 'OK') {
                    const location = results[0].geometry.location;
                    this.centerLat = location.lat().toString();
                    this.centerLng = location.lng().toString();
                    this.updateMapCenter();
                    this.showSearch = false;
                } else {
                    alert('Geocoding failed: ' + status);
                }
            });
        },

        setRadius(km) {
            this.radiusKm = km;
            this.updateRadius();
        },

        updateMapCenter() {
            if (this.map && this.centerLat && this.centerLng) {
                const center = new google.maps.LatLng(parseFloat(this.centerLat), parseFloat(this.centerLng));
                this.map.setCenter(center);

                if (this.marker) {
                    this.marker.setPosition(center);
                }

                if (this.circle) {
                    this.circle.setCenter(center);
                }
            }
        },

        updateRadius() {
            if (this.circle) {
                this.circle.setRadius(this.radiusKm * 1000); // Convert km to meters
            }
        },

        initializeMap() {
            if (!window.google) return;

            const center = new google.maps.LatLng(
                parseFloat(this.centerLat) || 14.5995,
                parseFloat(this.centerLng) || 120.9842
            );

            this.map = new google.maps.Map(document.getElementById('google-map'), {
                zoom: 13,
                center: center,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            this.marker = new google.maps.Marker({
                position: center,
                map: this.map,
                draggable: true,
                title: 'Voting Center'
            });

            this.circle = new google.maps.Circle({
                strokeColor: '#4F46E5',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#4F46E5',
                fillOpacity: 0.2,
                map: this.map,
                center: center,
                radius: this.radiusKm * 1000,
                editable: true
            });

            // Update coordinates when marker is dragged
            this.marker.addListener('dragend', () => {
                const position = this.marker.getPosition();
                this.centerLat = position.lat().toString();
                this.centerLng = position.lng().toString();
                this.circle.setCenter(position);
            });

            // Update radius when circle is edited
            this.circle.addListener('radius_changed', () => {
                this.radiusKm = (this.circle.getRadius() / 1000).toFixed(2);
            });
        }
    };
}

// Initialize map when Google Maps API is loaded
function initMap() {
    // This function is called by the Google Maps API
    console.log('Google Maps API loaded');
}
