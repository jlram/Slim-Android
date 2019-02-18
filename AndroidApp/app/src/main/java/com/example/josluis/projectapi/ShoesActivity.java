package com.example.josluis.projectapi;

import android.content.Intent;
import android.graphics.Color;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.annotation.RequiresApi;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.transition.Explode;
import android.view.MenuItem;
import android.view.Window;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class ShoesActivity extends AppCompatActivity {

    BottomNavigationView bottomNavigationView;
    RecyclerView recyclerView;
    List<String> list;
    Adaptador adapter;

    String URLConsulta;
    Request consulta;
    RequestQueue queue;

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        getWindow().requestFeature(Window.FEATURE_CONTENT_TRANSITIONS);
        getWindow().setExitTransition(new Explode());
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_shoes);

        setTitle("Zapatos");

        recyclerView = findViewById(R.id.recyclerShoe);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        queue = Volley.newRequestQueue(this);
        cargarCategorias();

        list = new ArrayList<>();

        adapter = new Adaptador(this, list);
        recyclerView.setAdapter(adapter);

        bottomNavigationView = findViewById(R.id.bottomnavigation);
        bottomNavigationView.setSelectedItemId(R.id.menu_shoe);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
            Intent i;
            switch (menuItem.getItemId()) {
                case R.id.menu_home:
                    i = new Intent(ShoesActivity.this, MainActivity.class);
                    startActivity(i);
                    finish();
                    break;

                case R.id.menu_category:
                    i = new Intent(ShoesActivity.this, CategoriesActivity.class);
                    startActivity(i);
                    finish();
                    break;
            }
              return true;
            }
        });

    }
    private void cargarCategorias() {
        URLConsulta = "https://slim-android-jlramos97.c9users.io/Slim-Android/Slim/api/v1/zapatos/get";

        consulta = new JsonArrayRequest(Request.Method.GET, URLConsulta, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {

                try {
                    for (int i = 0; i < response.length(); i++) {
                        JSONObject jo = response.getJSONObject(i);
                        String categoria = jo.getString("marca") + " " + jo.getString("modelo") + " - " + jo.getString("precio") + "€";
                        list.add(categoria);
                    }
                }
                catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(ShoesActivity.this, "Error llamando a la base de datos", Toast.LENGTH_SHORT).show();
                }

                adapter = new Adaptador(ShoesActivity.this, list);
                recyclerView.setAdapter(adapter);

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(ShoesActivity.this, "Ha ocurrido un error.", Toast.LENGTH_SHORT).show();
            }
        });
        queue.add(consulta);
    }

}
