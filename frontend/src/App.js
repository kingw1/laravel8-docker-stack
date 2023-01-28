import { useState, useEffect } from "react";
import axios from "axios";

const baseURL = "http://localhost:8100/api/products";

function App() {
  const [products, setProduct] = useState(null);

  useEffect(() => {
    const token = "4|ecfmAejV9u1a7cITd1oYPoi58xOHafSF1gMkCcdX";
    const config = {
      headers: { Authorization: `Bearer ${token}` },
    };

    axios.get(baseURL, config).then((res) => {
      setProduct(res.data);
    });
  }, []);

  if (!products) return null;

  return (
    <>
      <h1>Product List ({products.length})</h1>
      <table border="1" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Slug</th>
            <th>Price</th>
            <th>create at</th>
            <th>update at</th>
          </tr>
        </thead>
        <tbody>
          {products.map((product) => {
            return (
              <tr key={product.id}>
                <td>{product.id}</td>
                <td>{product.name}</td>
                <td>{product.slug}</td>
                <td>{product.price}</td>
                <td>{product.created_at}</td>
                <td>{product.updated_at}</td>
              </tr>
            );
          })}
        </tbody>
      </table>
    </>
  );
}

export default App;
