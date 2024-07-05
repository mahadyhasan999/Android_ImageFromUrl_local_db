package com.example.imagefromweb


import retrofit2.Call
import retrofit2.http.GET

interface ApiService {
    @GET("fetch_images.php")
    fun getImages(): Call<List<String>>
}
