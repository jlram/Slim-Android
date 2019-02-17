package com.example.josluis.projectapi;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.text.Layout;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

public class Adaptador extends RecyclerView.Adapter<Adaptador.MyViewHolder> {

    Context context;
    List<String> list;


    public Adaptador(Context context, List<String> list) {
        this.context = context;
        this.list = list;
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.rowcat, viewGroup, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(MyViewHolder viewHolder, int i) {
        viewHolder.txtView.setText(list.get(i));
    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    class MyViewHolder extends RecyclerView.ViewHolder {

        TextView txtView;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            txtView = itemView.findViewById(R.id.textViewrowCat);
        }
    }
}
