/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import ejecutes.AdminMenu;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import javax.swing.JComboBox;
import javax.swing.JOptionPane;
import model.Purchase;
import model.Member;
import model.Reserve;

import static model.Model.connect;

/**
 *
 * @author arambarri.oihana
 */
public class Model {
    /**
     * 
     * @return Connection to database
     */
    public static Connection connect() {
        Connection conn = null;
        try {
            String url = "jdbc:mariadb://localhost/bees_project";
            String user="root"; 
            String password="";
            conn = DriverManager.getConnection(url,user,password); 
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        } 
        
        return conn;
    }
    /**
     * Validate login 
     * Check the user and pass are in dataBase
     * @param user dni of member
     * @param pass password of member
     */
    public static void login(String user, String pass){
        String sql="SELECT dni, contraseña FROM personas WHERE dni= '"+user+"' AND contraseña= '"+pass+"'";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery()) {
            if (rs.next()) {
                user = rs.getString("dni");
                pass=rs.getString("contraseña");
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
            }else{
                JOptionPane.showMessageDialog(null, "Data wrong");            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
    }
    /***
     * 
     * @return Members of data base
     */
    public static ArrayList<Member> read() {
        ArrayList<Member> members = new ArrayList<>();
        String taula = "personas";
        String sql = "SELECT * FROM " + taula;

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Member m= new Member(rs.getString("dni"),rs.getString("nombre"),rs.getString("apellido"),rs.getString("gmail"),rs.getString("contraseña"),rs.getBoolean("admin"),rs.getString("dinero_pagar"),rs.getString("dinero_cuenta"),rs.getString("foto"));
                members.add(m);
            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
        return members;
    }
    /**
     * Add Member to DataBase
     * @param m object member
     * @return returns 1 if a member is added otherwise it returns 0
     */
    public static int addMember(Member m){
        String sql = "INSERT INTO personas(dni,nombre,apellido,gmail,contraseña,admin,dinero_pagar,dinero_cuenta,foto) VALUES(?,?,?,?,?,?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setString(1,m.getDni());
            ptmt.setString(2,m.getName());
            ptmt.setString(3,m.getSurname());
            ptmt.setString(4,m.getGmail());
            ptmt.setString(5,m.getPassword());
            ptmt.setBoolean(6,m.isAdmin());
            ptmt.setString(7,m.getMoneyToPay());
            ptmt.setString(8,m.getMoneyInAccount());
            ptmt.setString(9,m.getPhoto());
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
            return 0;
        }
    }
    /**
     * DeleteMember of DataBase
     * @param m object member
     */
    public static void deleteMember(Member m) {
        String sql = "DELETE FROM personas WHERE dni = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, m.getDni());
            pstmt.executeUpdate(); 

        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
    /**
     * Update data of member
     * @param m object member
     */
    public static  void updateMember(Member m) {
        String sql = "UPDATE personas SET nombre = ? ,"
                + "apellido = ? ,"
                + "gmail = ?,"
                + "contraseña= ? ,"
                + "admin= ?,"
                + "dinero_pagar = ? ,"
                + "dinero_cuenta = ?, "
                + "foto = ?"
                + "WHERE dni = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1,m.getName());
            pstmt.setString(2,m.getSurname());
            pstmt.setString(3, m.getGmail());
            pstmt.setString(4, m.getPassword());
            pstmt.setBoolean(5, m.isAdmin());
            pstmt.setString(6, m.getMoneyToPay());
            pstmt.setString(7, m.getMoneyInAccount());
            pstmt.setString(8, m.getPhoto());
            pstmt.setString(9, m.getDni());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
    public static void comboBoxMember(JComboBox<Member> comboMember) {
        String sql="SELECT * FROM personas";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                comboMember.addItem(new Member(rs.getString("dni"),rs.getString("nombre"),rs.getString("apellido"),rs.getString("gmail"),rs.getString("contraseña"),rs.getBoolean("admin"),rs.getString("dinero_pagar"),rs.getString("dinero_cuenta"),rs.getString("foto")));

            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
    }
    /**
     * 
     * @param comboLata
     */
    public static void comboBoxLatas(JComboBox<Latas> comboLata) {
        String sql="SELECT * FROM latas";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                comboLata.addItem(new Latas(rs.getInt("lata_id"),rs.getString("capacidad")));

            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
    }
    /**
     * 
     * @return reserve list
     */
    public static ArrayList<Reserve> readReserve() {
//        ArrayList<Reserve> reserves = new ArrayList<>();
//
//        String sql = "SELECT personas.dni, reservas.dia_reservado,latas.lata_id, reservas.dia_dereserva FROM reservas(( INNER JOIN personas ON reservas.dni = personas.dni),INNER JOIN latas ON reservas.lata_id = latas.lata_id)";
//
//        try (Connection conn = connect();
//                Statement stmt = conn.createStatement();
//                ResultSet rs = stmt.executeQuery(sql)) {
//            while (rs.next()) {
//                Reserve r= new Reserve(rs.getString("dni"),rs.getString("dia_reservado"),rs.getInt("id_lata"),rs.getString("dia_dereserva"));
//                reserves.add(r);
//            }
//        } catch (Exception ex) {
//            System.out.println(ex.getMessage());
//        }
//        return reserves;

        ArrayList<Reserve> reserves = new ArrayList<>();
        String taula = "reservas";
        String sql = "SELECT * FROM " + taula;

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Reserve r= new Reserve(rs.getString("dni"),rs.getString("dia_reservado"),rs.getInt("lata_id"),rs.getString("dia_dereserva"));
                reserves.add(r);
            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
        return reserves;
    }
    /**
     * Add reserve to database
     * @param r Reserve object
     * @return 1 if a reservation is added otherwise it returns 0
     */
    public static int addReserve(Reserve r){
        String sql = "INSERT INTO reservas(dni,dia_reservado,lata_id,dia_dereserva) VALUES(?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setString(1,r.getDni());
            ptmt.setString(2,String.valueOf(r.getDia_reservado()));
            ptmt.setInt(3,r.getIdLata());
            ptmt.setString(4,String.valueOf(r.getDia_dereserva()));
   
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
            return 0;
        }
    }
    /**
     * Delete reserve
     * @param r Reserve object
     */
    public static void deleteReserve(Reserve r) {
        String sql = "DELETE FROM reservas WHERE dia_reservado = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, String.valueOf(r.getDia_reservado()));
            pstmt.executeUpdate();

        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
    /**
     * Update reserve
     * @param r Reserve object
     */
    public static  void updateReserve(Reserve r) {
        String sql = "UPDATE reservas SET dni= ?,"
                + "lata_id = ?,"
                + "dia_dereserva = ?"
                + "WHERE dia_reservado = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1,r.getDni());
            pstmt.setInt(2,r.getIdLata());
            pstmt.setString(3,String.valueOf(r.getDia_dereserva()));
            pstmt.setString(4,String.valueOf(r.getDia_reservado()));
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    /**
     * See buy list
     * @return Purchase of DataBase
     */
    public static ArrayList<Purchase> readPurchase() {
        ArrayList<Purchase> buys = new ArrayList<>();
        String taula = "compras";
        String sql = "SELECT * FROM " + taula;

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Purchase b= new Purchase(rs.getInt("numeroCompra"),rs.getInt("id_producto"),rs.getString("precio"),rs.getInt("cantidad"));
                buys.add(b);
            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
        return buys;
    }
    /**
     * Add buys to database
     * @param b buys object
     * @return returns 1 if a buys is added otherwise it returns 0
     */
    public static int addPurchase(Purchase b){
        String sql = "INSERT INTO compras(numeroCompra,id_producto,precio,cantidad) VALUES(?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setInt(1,b.getNumberBuy());
            ptmt.setInt(2,b.getId_product());
            ptmt.setString(3,b.getPrice());
            ptmt.setInt(4,b.getAccount());
   
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
            return 0;
        }
    }
    /**
     * Delete Purchase of dataBase
     * @param b object buys
     */
    public static void deletePurchase(Purchase b) {
        String sql = "DELETE FROM compras WHERE numeroCompra = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, b.getNumberBuy());
            pstmt.executeUpdate();

        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
    /**
     * Update data of buys 
     * @param b object buys
     */
    public static void updatePurchase(Purchase b) {
        String sql = "UPDATE compras SET id_producto= ?, precio=?, cantidad=? WHERE numeroCompra=?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, b.getId_product());
            pstmt.setString(2, b.getPrice());
            pstmt.setInt(3, b.getAccount());
            pstmt.setInt(4, b.getNumberBuy());
            
            pstmt.executeUpdate();

        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
     public static ArrayList<Inventary> readInventary() {
        ArrayList<Inventary> inventaries = new ArrayList<>();
        String taula = "inventario";
        String sql = "SELECT * FROM " + taula;

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Inventary i= new Inventary(rs.getInt("id_producto"),rs.getString("nombre"),rs.getInt("cantidad"));
                inventaries.add(i);
            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null,ex.getMessage());
        }
        return inventaries;
    }
    public static int addInventary(Inventary i) {
        String sql = "INSERT INTO inventario(id_producto,nombre,cantidad) VALUES(?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setInt(1,i.getId_product());
            ptmt.setString(2,i.getName());
            ptmt.setInt(3,i.getAmount());
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
            return 0;
        }
    }
    public static void deleteInventary(Inventary i) {
        String sql = "DELETE FROM inventario WHERE id_producto = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1,i.getId_product());
            pstmt.executeUpdate();

        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
    public static void updateInventary(Inventary i) {
        String sql = "UPDATE inventario SET  nombre=?, cantidad=? WHERE id_producto =?";
        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, i.getName());
            pstmt.setInt(2, i.getAmount());
            pstmt.setInt(3, i.getId_product());
            pstmt.executeUpdate();

        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null,e.getMessage());
        }
    }
}
